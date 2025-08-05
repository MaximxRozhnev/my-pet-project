import Nav from './Nav';
import ThemeToggle from './ThemeToggle';

// Ключ	Минимальная ширина экрана	Описание
// sm	640px	Маленькие экраны (телефоны, планшеты)
// md	768px	Средние экраны (большие телефоны, планшеты)
// lg	1024px	Большие экраны (настольные ПК, ноутбуки)
// xl	1280px	Очень большие экраны
// 2xl	1536px	Сверхбольшие экраны

function Header() {
  return (
    <header className="fixed top-0 left-0 right-0 p-4 flex items-center gap-4
        bg-green-600 dark:bg-green-700
        z-50
    ">
      <img
        src="/images/profile.jpg"
        className="rounded w-12 sm:w-18 lg:w-24"
        alt="Фото профиля"
      />
      <Nav />
      <ThemeToggle />
    </header>
  );
}


export default Header;
