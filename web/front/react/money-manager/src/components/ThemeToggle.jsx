import { useTheme } from "../hooks/useTheme";

function ThemeToggle() {
  const { theme, toggleTheme } = useTheme();

  return (
    <button
      onClick={toggleTheme}
      className="ml-auto flex items-center justify-center flex-shrink-0
      w-12 h-12 md:w-16 md:h-16 lg:w-24 lg:h-24
      shadow"
    >
      <p className="text-base sm:text-xl lg:text-4xl">
        {theme === "dark" ? "☀️" : "🌙"}
      </p>
    </button>
  );
}

export default ThemeToggle;
