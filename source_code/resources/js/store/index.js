import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import "../components/assets/styles/main.css";
import router from '../router'

const readerModule = {
    state: () => ({
        currentThemeId: 0, //当前主题，统一设置
        currentFontSize: 16, //当前字体大小，统一设置
        currentBookInfo: null, //当前书籍信息
        currentHref: "", //跳转的位置
        currentNavigation: {}, //当前目录
        isTitleAndMenuShow: false, //菜单和顶部是否显示
        isSettingShow: false, //设置栏是否显示
        isContentShow: false, //内容区域是否显示
        isBookAvailable: false, //书籍是否可用
        bookDatabase: null, //indexedDB数据库
        bookInfoList: null //indexedDB数据表-书籍信息
    }),
    mutations: {
        setCurrentThemeId(state, id) {
            state.currentThemeId = id;
            localStorage.setItem("currentThemeId", id);
        },
        setCurrentFontSize(state, fontSize) {
            state.currentFontSize = fontSize;
            localStorage.setItem("currentFontSize", fontSize);
        },
        setCurrentBookInfo(state, data) {
            state.currentBookInfo = data;
        },
        setCurrentHref(state, href) {
            state.currentHref = href;
        },
        setCurrentNavigation(state, data) {
            state.currentNavigation = data;
        },
        setTitleAndMenuShow(state, flag) {
            state.isTitleAndMenuShow = flag;
        },
        setSettingShow(state, flag) {
            state.isSettingShow = flag;
        },
        setContentShow(state, flag) {
            state.isContentShow = flag;
        },
        setBookAvailable(state, flag) {
            state.isBookAvailable = flag;
        },
        setBookDatabase(state, object) {
            state.bookDatabase = object;
        },
        setBookInfoList(state, data) {
            state.bookInfoList = data;
        }
    },
    actions: null,
    getters: {
        currentThemeId(state) {
            return state.currentThemeId;
        },
        currentFontSize(state) {
            return state.currentFontSize;
        },
        currentBookInfo(state) {
            return state.currentBookInfo;
        },
        currentHref(state) {
            return state.currentHref;
        },
        currentNavigation(state) {
            return state.currentNavigation;
        },
        isTitleAndMenuShow(state) {
            return state.isTitleAndMenuShow;
        },
        isSettingShow(state) {
            return state.isSettingShow;
        },
        isContentShow(state) {
            return state.isContentShow;
        },
        isBookAvailable(state) {
            return state.isBookAvailable;
        },
        bookDatabase(state) {
            return state.bookDatabase;
        },
        bookInfoList(state) {
            return state.bookInfoList;
        }
    }
};

const mainPageModule = {
    state: () => ({
        loaded: false,
        Sections: [{
                sectionType: "category"
            },
            {
                sectionType: "category"
            },
            {
                sectionType: "authors"
            }
        ],

        token: localStorage.getItem("access_token") || null,
        hasLoadedOnce: false,

        Section: {},
        SectionLoaded: false,

        base_url_without_api: 'http://127.0.0.1:8000/',
        base_url: 'http://127.0.0.1:8000/api/',
        // base_url_without_api: 'https://reader.prosthesis.kz/',
        // base_url: 'https://reader.prosthesis.kz/api/',

        searchResult: null,
        searchFragment: null,
        errorMessage: '',
        errors: [],

        profile: {
            email: 'loading..'
        },
        profileDefault: {
            email: 'loading..'
        },

        library: {
            Loaded: false,
            books: [{},
                {},
                {}
            ]
        },
        libraryDefault: {
            Loaded: false,
            books: [{},
                {},
                {}
            ]
        },

    }),
    mutations: {
        setSections(state, data) {
            console.log("setting sections");
            state.Sections = Array();

            data.forEach(section => {
                state.Sections.push(section);
            });

            state.loaded = true;
            console.log(state.Sections);
        },
        setSection(state, data) {
            state.Section = data;
            state.SectionLoaded = true;
        },
        resetData(state) {
            // console.log("RESETTING SECTION");
            state.Section = {};
            state.searchResult = null;
            state.SectionLoaded = false;
        },
        setSearchFragment(state, data) {
            state.searchFragment = data;
        },
        setSearchResult(state, data) {
            console.log(data)
            state.searchResult = data;
        },
        addSearchResult(state, data) {
            console.log(data)
            let oldData = state.searchResult.data.body;
            oldData = oldData.concat(data.data.body)
            data.data.body = oldData;
            state.searchResult = data;
        },
        retrieveToken(state, token) {
            state.token = token;
        },
        destroyToken(state) {
            state.token = null;
        },
        setErrorMessage(state, data) {
            state.errorMessage = data;
        },
        addErrorMessage(state, data) {
            state.errors.push(data)
        },
        resetErrors(state) {
            state.errors = []
        },
        setProfile(state, data) {
            state.profile = data;
        },
        setLibrary(state, data) {
            state.library = data;
            for (let i = 0; i < state.library.length; i++)
                state.library[i].is_added = true

        },
        addBookToLibrary(state, book) {
            let bookExists = false
            for (let i = 0; i < state.library.length; i++)
                if (state.library[i].id === book.id)
                    bookExists = true

            if (bookExists)
                state.library.push(book);
        },
        deleteBookFromLibrary(state, book) {
            console.log(book)
            for (let i = 0; i < state.library.length; i++) {
                if (state.library[i].id === book.id) {
                    console.log(state.library[i])
                    state.library.splice(i, 1);
                    break
                }
            }
        }
    },
    actions: {
        fetchSections({
            commit,
            state
        }) {
            axios.get("/api/sections")
                .then(
                    response => {
                        console.log(response.data);
                        commit("setSections", response.data["sections"]);
                    }
                );
        },
        searchFragment({
            commit,
            state
        }, fragment) {
            const searchFragment = {
                'fragment': fragment,
            };
            commit('setSearchFragment', searchFragment);
            axios.post('/api/search', searchFragment)
                .then(response => commit("setSearchResult", response.data))
                .catch(error => {
                    commit("setErrorMessage", 'Ештене табылмады');
                    commit("setSearchResult", null)
                    commit("setSearchFragment", null)
                    console.error("There was an error!", error);
                });

        },
        searchPagination({
            commit,
            state
        }) {

            if (state.searchFragment)
                axios.post(state.searchResult.next_page_url, state.searchFragment)
                .then(response => commit("addSearchResult", response.data))
                .catch(error => {
                    commit("setErrorMessage", 'Ештене табылмады');
                    commit("setSearchResult", null)
                    console.error("There was an error!", error);
                });

        },
        fetchSections({
            commit,
            state
        }) {
            axios.get("/api/sections/").then(response => {
                console.log("this is just a test" + response.data);
                commit("setSections", response.data["sections"]);
            });
        },
        signupUser({
            commit,
            dispatch
        }, creds) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/register", creds)
                    .then(response => {
                        const token = response.data.token;
                        localStorage.setItem("access_token", token);
                        commit("retrieveToken", token);

                        dispatch("fetchProfile");
                        dispatch("fetchLibrary");

                        resolve(response);
                    })
                    .catch(error => {
                        commit("addErrorMessage", error.response.data.message);
                        console.log("ERRRR:: ", error.response.data);
                        throw new UserException(error.response.data)
                    });
            });
        },
        retrieveToken({
            commit,
            dispatch
        }, creds) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/login", creds)
                    .then(response => {
                        const token = response.data.token;
                        console.log("Token stored in the local storage: " + token)

                        localStorage.setItem("access_token", token);
                        commit("retrieveToken", token);

                        dispatch("fetchProfile");
                        dispatch("fetchLibrary");

                        resolve(response);
                    })
                    .catch(error => {
                        commit("addErrorMessage", error.response.data.message);
                        console.log("ERRRR:: ", error.response.data);
                        console.log(error);
                        reject(error);
                    });
            });
        },
        destroyToken({
            dispatch,
            state,
            getters,
            commit
        }) {
            axios.defaults.headers.common["Authorization"] =
                "Bearer " + state.token;

            if (getters.isAuthorized) {
                localStorage.removeItem("access_token");
                commit("setProfile", state.profileDefault);
                commit("setLibrary", state.libraryDefault);
                commit("destroyToken");
            }
        },
        fetchProfile({
            commit,
            dispatch
        }) {
            var token = localStorage.getItem('access_token')
            axios.defaults.headers.common["Authorization"] =
                "Bearer " + token;

            axios.get("/api/profile").then(response => {
                console.log("Profile");
                console.log(response.data);
                commit("setProfile", response.data);
            }).catch(error => {
                console.log("token out of date");
                dispatch('destroyToken');
                router.push('login');
            });;
        },
        fetchLibrary({
            commit,
            state,
            dispatch
        }) {

            var token = localStorage.getItem('access_token')
                // axios.defaults.headers.common["Authorization"] =
                //     "Token " + token;

            axios.post("/api/MyBooks",

                {
                    heades: {
                        "Authorization": "Token " + token
                    }
                }

            ).then(response => {
                console.log("library books");
                console.log(response.data);
                commit("setLibrary", response.data);
            }).catch(error => {
                // console.log("token out of date");
                // dispatch('destroyToken');
                commit('setLibrary', state.libraryDefault);
            });;
        },
        addBook({
            commit,
            dispatch
        }, book) {
            console.log("addBook action on index.js, the received book id is: ", book.id)
            return new Promise((resolve, reject) => {
                axios.post("/api/library/add", {
                    book_id: book.id
                }).then(res => {
                    commit('addBookToLibrary', book)
                    resolve(res);
                }).catch(e => {
                    reject(e);
                })
            });
        },
        deleteBook({
            commit,
            dispatch
        }, book) {
            console.log("deleteBook action on index.js, the received book id is: ", book.id)
            return new Promise((resolve, reject) => {
                axios.post("/api/library/delete", {
                    book_id: book.id
                }).then(res => {
                    commit('deleteBookFromLibrary', book)
                    resolve(res);
                }).catch(e => {
                    reject(e);
                })
            });
        },
    },
    getters: {
        isLoaded(state) {
            return state.loaded;
        },
        isSectionLoaded(state) {
            return state.SectionLoaded;
        },
        sections(state) {
            return state.Sections;
        },
        Section(state) {
            return state.Section;
        },
        base_url(state) {
            return state.base_url;
        },
        base_url_without_api(state) {
            return state.base_url_without_api;
        },
        searchResult(state) {
            return state.searchResult;
        },
        errors(state) {
            return state.errors;
        },
        errorMessage(state) {
            return state.errorMessage;
        },
        isAuthorized(state) {
            return !!state.token
        },
        library(state) {
            return state.library;
        },
        profile(state) {
            return state.profile
        }
    },
}

const TestModule = {
    state: () => ({
        Test: {},
        testState: 0,
        testScore: 0,
        testResult: {},
        colorStyle: "",
        Answers: []
    }),
    mutations: {
        setTest(state, data) {
            console.log("setting Test");

            state.Test = data;

            state.testState = 0;
            state.testScore = 0;
            state.testResult = {};

            console.log(state.Test);
        },
        resetTest(state) {
            console.log("resetting Test");

            state.Test = {};
            state.testState = 0;
            state.testScore = 0;
            state.testResult = {};

            console.log(state.Test);
        },
        resetOnlyProgress(state) {
            state.testState = 0;
            state.testScore = 0;
            state.testResult = {};
        },
        setColorStyle(state, colorStyle) {
            state.colorStyle = colorStyle;
        },
        startTest(state) {
            state.testState = 1;
        },
        finishTest(state) {
            state.testState = 2;
        },
        setTestScore(state, score) {
            state.testScore = score;
        },
        setTestResult(state, data) {
            state.testResult = data;
        }
    },
    actions: {
        fetchTest({
            commit
        }, id = 1) {
            console.log(id);

            // commit( "setTest", {} );

            //change
            axios
                .get("/api/test/" + id)
                .then(response => {
                    console.log(response.data);
                    commit("setTest", response.data);
                });
        },
        setColorStyle({
            commit
        }, colorStyle = "first") {
            commit("setColorStyle", colorStyle);
        },
        sendTestScore({
            state,
            commit,
            dispatch
        }, score) {
            commit("setTestScore", score);
            console.log(state.testScore);
            // call fetchTestResult after sending the data -> something send Test score axios...
            dispatch("fetchTestResult");
            return;
        },
        fetchTestResult({
            commit,
            state
        }) {
            console.log(state.Test.id);
            axios
                .get("https://next.json-generator.com/api/json/get/EynXOCldt")
                .then(response => {
                    console.log(response.data);
                    commit("setTestResult", response.data);
                });
        }
    },
    getters: {
        Test(state) {
            return state.Test;
        },
        testState(state) {
            return state.testState;
        },
        colorStyle(state) {
            return state.colorStyle;
        },
        testScore(state) {
            return state.testScore;
        },
        testResult(state) {
            return state.testResult;
        }
    }
};

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        main: mainPageModule,
        reader: readerModule,
        test: TestModule
    }
});