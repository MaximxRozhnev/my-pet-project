import { useState } from "react"
import { CARDS } from "./cards.data"
import { HISTORY } from "./history.data"

import CardRender from "./CardRender"
import HistoryRender from "./HistoryRender"
import ChartRender from "./ChartRender"


function App() {
  const [isHideMoney, setIsHideMoney] = useState(false)

  return (
    <div >
      {/* Надпись верхняя */}
      <div className="flex items-center m-4 gap-4 pt-20 md:pt-30">
        <p className="text-2xl font-medium text-gray-700 dark:text-white">Кошелёк ›</p>

        <button className="ml-auto flex-shrink-0" onClick={() => setIsHideMoney(prev => !prev)}>
          <img className="w-8 rotate-x-180" src={isHideMoney ? "/images/icons/closeEye.svg" : "/images/icons/Eye.svg"} />
        </button>
      </div>


      {/* Блок карт */}
      <div className="overflow-x-auto whitespace-nowrap m-4"> {/* Обёртка со скроллом */}
        <div className="flex gap-4">  {/* Сетка для карт */}
          {/* Получение карт */}
          { CARDS.length ? CARDS.map(card => (
            <CardRender key={card.id} card={card} isHideMoney={isHideMoney} />
          )) : 'Cards not found' }
        </div>
      </div>

      {/* История */}
      {<HistoryRender history={HISTORY} cards={CARDS} isHideMoney={isHideMoney}/>}

      {/* График */}
      {<ChartRender history={HISTORY} isHideMoney={isHideMoney}/>}
    </div>

  )
}

export default App
