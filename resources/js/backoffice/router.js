import {createRouter, createWebHashHistory} from 'vue-router'
import routes from './routes'

const router = createRouter({
    routes,
    history: createWebHashHistory()
})

router.afterEach((route) => console.log(route))

export default router
