import { createRouter , createWebHistory} from "vue-router";
import LandingPage from '../Views/LandingPage/LandingPage';

const routes = [
    {
        path: '/',
        name: 'landingPage',
        component: LandingPage
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router
