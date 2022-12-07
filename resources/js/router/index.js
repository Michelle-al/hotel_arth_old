import { createRouter , createWebHashHistory} from "vue-router";
import LandingPage from '../Views/LandingPage/LandingPage';
import Login from '../Views/Login';
import SignUp from '../Views/SignUp'

const routes = [
    {
        path: '/',
        name: 'landingPage',
        component: LandingPage
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/signup',
        name: 'signUp',
        component: SignUp
    }
]

const router = createRouter({
    history: createWebHashHistory(process.env.BASE_URL),
    routes
})
export default router
