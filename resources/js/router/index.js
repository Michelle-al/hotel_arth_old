import { createRouter , createWebHashHistory} from "vue-router";
import LandingPage from '../Views/LandingPage/LandingPage';
import Login from '../Views/Login';
import SignUp from '../Views/SignUp';
import Reservation from "../Views/Reservation/Reservation.vue";
import Options from "../Views/Reservation/Options.vue";
import RoomCategories from "../Views/LandingPage/Components/RoomCategories.vue";
import Advantages from "../Views/LandingPage/Components/Advantages.vue";
import UserReviews from "../Views/LandingPage/Components/UserReviews.vue";
import News from "../Views/LandingPage/Components/News.vue";
import Validation from "../Views/Reservation/Validation";

const routes = [
    {
        path: '/',
        name: 'landingPage',
        component: LandingPage
    },
    {
        path: '/rooms',
        name: 'roomCategories',
        component: RoomCategories
    },
    {
        path: '/advantages',
        name: 'advantages',
        component: Advantages
    },
    {
        path: '/reviews',
        name: 'userReviews',
        component: UserReviews
    },
    {
        path: '/news',
        name: 'news',
        component: News
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
    },
    {
        path: '/reservation',
        name: 'reservation',
        component: Reservation
    },
    {
        path: '/options',
        name: 'options',
        component: Options
    },
    {
        path: '/validation',
        name: 'validation',
        component: Validation
    },
]

const router = createRouter({
    history: createWebHashHistory(process.env.BASE_URL),
    routes
})
export default router
