import { delimiterNumber } from "../../utils/delimeterNumber";
import { hiddenDelimiterNumber } from "../../utils/hiddenDelimiterNumber";

function OperationItem({ icon, cardName, amountColorClass, balanceDiff, operation, isHideMoney}) {
  const { amount, status, cardId, category, title } = operation
  return (
    <div className="w-full flex items-start gap-3 p-3">
      {/* Иконка */}
      <img className="w-10 h-10 m-auto" src={icon} alt="Операция" />

      {/* Контент */}
      <div className="w-full p-2 border-b border-gray-400 dark:border-slate-200">
        {/* Верхняя строка: Название + Сумма справа */}
        <div className="flex justify-between items-center w-full">
          <p className="text-lg dark:text-white text-gray-900">{title}</p>
          <p className={`text-lg font-medium ${amountColorClass}`}>
            {isHideMoney ? hiddenDelimiterNumber(Math.abs(amount)) : delimiterNumber(Math.abs(amount))} ₽
          </p>
        </div>

        {/* Средняя строка: Категория */}
        <p className="text-sm dark:text-gray-400 text-gray-500 font-semibold">{category}</p>

        {/* Нижняя строка: Карта + расчёт */}
        <p className={`text-sm ${status === 'success' ? 'dark:text-gray-400 text-gray-500' : 'text-red-500'}`}>
          {cardName}:&nbsp;
          {status === 'success' ? `${ isHideMoney ? hiddenDelimiterNumber(balanceDiff.toFixed(2)) : delimiterNumber(balanceDiff.toFixed(2))} ₽` : 'Недостаточно средств'}
        </p>
      </div>
    </div>
  );
}

export default OperationItem