/**
 * Форматирует число, разделяя его на группы символов через пробел.
 * 
 * @param {number} numbers - Число, которое нужно отформатировать.
 * @param {number} [count=3] - Количество символов в одной группе (по умолчанию 3).
 * @param {boolean} [after=false] - Разделять ли дробную часть (после запятой/точки) на группы.
 * 
 * @returns {string} - Отформатированное строковое представление числа с разделителями.
 * 
 * @example
 * delimiterNumber(-10000.53)            // "-10 000.53"
 * delimiterNumber(545455)               // "545 455"
 * delimiterNumber(12333, 2)             // "1 23 33"
 * delimiterNumber(1344.3233, 2, true)   // "13 44.32 33"
*/
export function delimiterNumber(numbers, count = 3, after = false) {
  const [intPart, decimalPart] = Math.abs(numbers).toString().split(".");
  const sign = numbers < 0 ? "-" : "";

  const group = (str, cnt, fromEnd = true) => {
    const re = new RegExp(`.{1,${cnt}}`, "g");
    const parts = fromEnd ? str.split("").reverse().join("").match(re).map(s => s.split("").reverse().join("")).reverse()
                          : str.match(re);
    return parts.join(" ");
  };

  const intGrouped = group(intPart, count);
  const decGrouped = after && decimalPart ? group(decimalPart, count, false) : decimalPart;

  return sign + intGrouped + (decGrouped ? "." + decGrouped : "");
}


