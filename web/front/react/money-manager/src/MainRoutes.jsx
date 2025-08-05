import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import App from "./pages/Home/App";
import Header from "./components/Header";
import CardPage from "./pages/Card/CardPage";

export function MainRoutes() {
    return <Router>
        <Header />
        <Routes>
            <Route path='/' element={<App/>} />
            <Route path='/card/:id' element={<CardPage/>} />
        </Routes>
    </Router>
}
