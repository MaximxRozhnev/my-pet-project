import { useContext } from "react"
import { ThemeContext } from "../context/Theme.Context"

export function useTheme() {
    return useContext(ThemeContext)
}