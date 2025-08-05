import { useState } from "react"
import OperationItem from "./OperationItem"

/**
 * Возвращает класс цвета текста для суммы операции.
 */
function getAmountColorClass(operation) {
  if (operation.status === 'pending') {
    return 'text-gray-700 dark:text-gray-500'
  }

  switch (operation.type) {
    case 'topup':
    case 'income':
      return 'text-green-600'
    case 'withdrawal':
      return 'text-red-500'
    case 'payment':
      return 'text-gray-500 dark:text-white'
    case 'transfer':
      return operation.amount > 0 ? 'text-green-600' : 'text-red-500'
    default:
      return 'text-gray-500 dark:text-white'
  }
}

/**
 * Возвращает путь к иконке по типу операции.
 */
function getOperationIcon(type) {
  const iconMap = {
    transfer: '/images/icons/moneyTransfer.svg',
    payment: '/images/icons/payment.svg',
    income: '/images/icons/income.svg',
    withdrawal: '/images/icons/withdrawal.svg',
    topup: '/images/icons/topup.svg',
  }
  return iconMap[type] || '/images/icons/default.svg'
}

function renderOperation(operation, card, isHideMoney) {
  const balanceDiff = card.balance + operation.amount
  const amountColorClass = getAmountColorClass(operation)
  const icon = getOperationIcon(operation.type)

  return (
    <OperationItem
      key={operation.id}
      cardName={card.name}
      icon={icon}
      amountColorClass={amountColorClass}
      balanceDiff={balanceDiff}
      operation={operation}
      isHideMoney={isHideMoney}
    />
  )
}

function HistoryRender({ history, cards, isHideMoney }) {
  const [isOpen, setIsOpen] = useState(true)

  return (
    <div className="rounded-2xl m-4 dark:bg-gray-800 bg-[#DDE2EB]">
      <button
        className="p-4 w-full text-left font-medium text-xl flex items-center justify-between gap-2 
                  hover:bg-gray-100 dark:hover:bg-gray-800 transition rounded-t-2xl focus:outline-none"
        onClick={() => setIsOpen(prev => !prev)}
        aria-expanded={isOpen}
      >
        <span className="text-gray-700 dark:text-white">История</span>
        <span className="text-base text-gray-700 dark:text-white">{isOpen ? '▲' : '▼'}</span>
      </button>

      {isOpen && (
        <div className="px-4 max-h-[400px] overflow-y-auto space-y-2">
          {history.slice(0, 10).map(operation =>
            renderOperation(operation, cards[operation.cardId - 1], isHideMoney)
          )}
        </div>
      )}
    </div>
  )
}

export default HistoryRender
