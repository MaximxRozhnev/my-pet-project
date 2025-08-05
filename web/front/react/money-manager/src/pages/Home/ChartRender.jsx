import { useEffect, useState } from "react"
import { hiddenDelimiterNumber } from "../../utils/hiddenDelimiterNumber"
import { monthNamesShort } from "../../constants/month"
import { operationType } from "../../constants/operationType"
import { operationCategory } from "../../constants/operationCategory"

function getLast6Months() {
  const now = new Date()
  const result = []
  for (let i = 5; i >= 0; i--) {
    const d = new Date(now.getFullYear(), now.getMonth() - i, 1)
    result.push(d)
  }
  return result
}

function ChartRender({ history, isHideMoney }) {
  const last6Months = getLast6Months()
  const sumsMap = {}

  const [width, setWidth] = useState(window.innerWidth);

  useEffect(() => {
    const handleResize = () => setWidth(window.innerWidth);
    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  // Подсчитываем доход по месяцам (группируем по год-месяц)
  history.forEach(op => {
    if(op.type === operationType.INCOME ||
      op.type === operationType.TOPUP ||
      (op.type === operationType.TRANSFER && op.category === operationCategory.INCOME)) {
        const date = new Date(op.date)
        const key = `${date.getFullYear()}-${date.getMonth()}` // 0-based месяц
        sumsMap[key] = (sumsMap[key] || 0) + op.amount
      }
  })

  // Максимальная сумма для высоты столбца
  const maxAmount = Math.max(...last6Months.map(d => sumsMap[`${d.getFullYear()}-${d.getMonth()}`] || 0), 1)

  return (
    <div className="m-4 dark:bg-gray-800 bg-[#DDE2EB] rounded-xl text-white">
      <p className="p-4 dark:text-white text-gray-700 font-medium text-xl">Доход:</p>
      <div className="flex items-end gap-6 p-2  justify-center w-full">
        {last6Months.map(date => {
          const key = `${date.getFullYear()}-${date.getMonth()}`
          const amount = sumsMap[key] || 0
          let heightPx = (amount / maxAmount) * 80

          if (width >= 1024) { // lg и выше (примерно)
            heightPx *= 6
          } else if (width >= 768) { // md и выше
            heightPx *= 3
          }

          return (
            <div key={key} className="flex flex-col items-center">
              <div
                className={`bg-green-500 rounded-t-md w-5 md:w-15 lg:w-30 xl:w-40`}
                style={{ height: `${heightPx}px`}}
                title={`${amount.toFixed(2)} ₽`}
              />
              <div className="mt-2 text-sm font-semibold dark:text-white text-gray-700">{monthNamesShort[date.getMonth()]}</div>
              <div className="text-xs mt-1 dark:text-white text-gray-600">{isHideMoney ? hiddenDelimiterNumber(amount.toFixed(0)) : amount.toFixed(0)} ₽</div>
            </div>
          )
        })}
      </div>
    </div>
  )

}

export default ChartRender
