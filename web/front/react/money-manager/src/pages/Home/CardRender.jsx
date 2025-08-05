import { Link } from "react-router-dom"
import { delimiterNumber } from "../../utils/delimeterNumber"
import { hiddenDelimiterNumber } from "../../utils/hiddenDelimiterNumber"

function CardRender({card, isHideMoney}) {
    return (
        // <Link to={`/movie/${movie.trailerYoutubeId}`} className='btn'>
        //             🔗
        //         </Link>
        
        
        <Link to={`/card/${card.id}`} className="w-42 h-40  rounded-2xl shadow-md flex-shrink-0 
            text-xl p-4 flex flex-col justify-between
            text-white dark:text-white 
            bg-[#DDE2EB] dark:bg-slate-100/10
            ">

            {/* Иконка карты */}
            <div className="w-10 h-8 bg-gray-200 rounded flex items-center justify-center">
                <img className="w-6 h-6" src={`/images/cards/${card.type}.svg`} />
            </div>


            {/* Блок, который прижат к низу */}
            <div>
                <p className="font-medium text-gray-700 dark:text-white">{isHideMoney ? hiddenDelimiterNumber(card.balance): delimiterNumber(card.balance)} ₽</p>
                <div className="flex items-center max-w-36 text-sm dark:text-gray-400 text-gray-600">
                    <p className="truncate flex-grow">{card.name}</p>
                    <p className="flex-shrink-0 ml-1">** {card.number.slice(-4)}</p>
                </div>
            </div>

        </Link>

    )
}

export default CardRender