/**
 * Возвращает строку, состоящую из символов `*`, длиной равной количеству цифр в целой части числа.
 * Используется для скрытия денежных сумм в пользовательском интерфейсе.
 * 
 * @param {number} value - Число, которое нужно замаскировать.
 * @returns {string} - Строка из символов `*`, соответствующая длине целой части числа.
 * 
 * @example
 * hiddenDelimiterNumber(0)          // "*"
 * hiddenDelimiterNumber(123.45)     // "***"
 * hiddenDelimiterNumber(1000000.9)  // "*******"
 */
export function hiddenDelimiterNumber(value) {
  const intPart = Math.floor(Math.abs(Number(value))).toString();
  return '*'.repeat(intPart.length);
}
