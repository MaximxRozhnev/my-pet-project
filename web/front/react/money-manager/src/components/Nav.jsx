import { Link } from "react-router-dom";

function Nav() {
  return (
    <nav className="">
          <Link
            to="/"
            className="md:text-2xl text-lg font-semibold text-gray-800 dark:text-white hover:text-gray-700"
          >
            Главная
          </Link>
    </nav>
  );
}

export default Nav;
