import { useParams } from "react-router-dom";
import { CARDS } from "../Home/cards.data";
import { HISTORY } from "../Home/history.data";

function CardPage() {
  const { id } = useParams();
  const card = CARDS.find(c => c.id === +id);
  const operations = HISTORY.filter(h => h.cardId === +id);

  if (!card) {
    return (
      <div className="p-6 text-center text-red-600 text-xl font-semibold">
        Карта с ID {id} не найдена
      </div>
    );
  }

  return (
    <div className="mt-30 md:mt-40 mx-4">
      <div className="bg-white dark:bg-gray-900 shadow-lg rounded-xl p-6 mb-6">
        <h2 className="text-3xl font-bold mb-2">{card.name}</h2>
        <p className="uppercase text-sm text-gray-400 mb-1">{card.type}</p>
        <p className="text-gray-600 mb-2">{card.number.replace(/(.{4})/g, '$1 ').trim()}</p>
        <p className={`text-2xl font-bold ${card.balance < 0 ? 'text-red-500' : 'text-green-500'}`}>
          {card.balance.toLocaleString("ru-RU", {
            style: "currency",
            currency: "RUB"
          })}
        </p>
      </div>

      <div>
        <h3 className="text-2xl font-semibold mb-4">История операций</h3>
        <div className="space-y-3">
          {operations.length === 0 ? (
            <p className="text-gray-500">Нет операций по данной карте.</p>
          ) : (
            operations.map(op => (
              <div
                key={op.id}
                className="flex justify-between items-center bg-white dark:bg-gray-800 p-4 rounded-lg shadow"
              >
                <div>
                  <p className="font-semibold">{op.title}</p>
                  <p className="text-sm text-gray-500">{op.description}</p>
                  <p className="text-xs text-gray-400">
                    {new Date(op.date).toLocaleString("ru-RU")}
                  </p>
                </div>
                <div className="text-right">
                  <p
                    className={`text-lg font-bold ${
                      op.amount < 0 ? "text-red-500" : "text-green-500"
                    }`}
                  >
                    {op.amount.toLocaleString("ru-RU", {
                      style: "currency",
                      currency: "RUB"
                    })}
                  </p>
                  <p className="text-sm text-gray-500">{op.category}</p>
                </div>
              </div>
            ))
          )}
        </div>
      </div>
    </div>
  );
}

export default CardPage