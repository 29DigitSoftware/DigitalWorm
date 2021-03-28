import NotFound from '../components/NotFound';
import KokzhiekAlemi from '../views/KokzhiekAlemi';
import Search from '../views/Search';
import Find from '../views/Find';
import AuthorInfo from '../views/AuthorInfo';
import Authors from '../views/Authors';
import Book_info from '../views/Book_info';
import Books from '../views/Books';
import Library from '../views/Library';
import Tests from '../views/Tests';
import TestIntro from '../views/TestIntro';
import Login from '../views/Login';
import SignUp from '../views/SignUp';
import Test from '../views/Test'

import Profile from '../views/profile-page';
import MainPage from '../components/MainPage'
import PricingTable from '../components/pricingTable'

import Reader from '../components/Reader';

export default [{
        path: '*',
        component: NotFound
    },
    {
        path: '/',
        component: MainPage,
        meta: {
            title: "Main Page"
        }
    },
    {
        path: '/pricing-table',
        component: PricingTable,
        meta: {
            title: "pricing-table"
        }
    },
    {
        name: 'catalog',
        path: '/catalog',
        component: KokzhiekAlemi,
        meta: {
            title: "Catalog"
        },
    },
    {
        path: '/signup',
        component: SignUp
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
    },
    {
        path: '/test',
        component: Test
    },
    {
        path: '/search',
        component: Search,
        meta: {
            title: "search"
        }
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile,
        meta: {
            title: "profile"
        }
    },
    {
        path: '/find',
        component: Find,
        meta: {
            title: "find"
        }
    },
    {
        path: '/authors',
        name: 'authors',
        component: Authors,
        meta: {
            title: "authors"
        }
    },
    {
        path: '/author_info',
        name: 'author_info',
        component: AuthorInfo
    },
    {
        path: '/tests',
        name: 'tests',
        component: Tests,
        meta: {
            title: "tests"
        }
    },
    {
        path: '/test_intro',
        name: 'test_intro',
        component: TestIntro,
        meta: {
            title: "test_intro"
        }
    },
    {
        path: '/test_process',
        name: 'test_process',
        component: () =>
            import ('../views/TestProcess'),
        meta: {
            title: "test_process"
        }
    },
    {
        path: '/test_result',
        name: 'test_result',
        component: () =>
            import ('../views/TestResult'),
        meta: {
            title: "test_result"
        }
    },
    {
        path: '/books',
        name: 'books',
        component: Books
    },
    {
        path: '/library',
        name: 'library',
        component: Library
    },
    {
        path: '/bookInfo',
        name: 'book_info',
        component: Book_info
    },
    {
        path: '/reader',
        name: 'reader',
        component: Reader,
        // component: () =>
        //     import ('../components/Reader'),
    },
    {
        path: '/close',
        name: 'close',
        component: NotFound,
    },
]