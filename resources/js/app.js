/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const { default: Axios } = require("axios");

var animalEnerji = animal[0]['Enerji'] ;
var animalFosfor = animal[0]['Fosfor'] ;
var animalHp = animal[0]['Hp'] ;
var animalKalsiyum = animal[0]['Kalsiyum'] ;
var animalLinoliekAsit = animal[0]['LinoliekAsit'] ;
var animalMeganizyum = animal[0]['Meganizyum'] ;
var animalSodyum = animal[0]['Sodyum'] ;
var animalYag = animal[0]['Yag'] ;

var solver = require("javascript-lp-solver"),
    model = {
        "optimize": "profit",
        "opType": "min",
        "constraints": {
            "Hp": { "min": animalHp * 0.999, "max": animalHp * 2.5 },
            "Meganizyum": { "min": animalMeganizyum * 0.999, "max": animalMeganizyum * 2.5 },
            "LinoliekAsit": { "min": animalLinoliekAsit * 0.999, "max": animalLinoliekAsit * 2.5 },
            "Enerji": { "min": animalEnerji * 0.999, "max": animalEnerji * 1.2 },
            "Kalsiyum": { "min": animalKalsiyum * 0.999, "max": animalKalsiyum * 1.2 },
            "Fosfor": { "min": animalFosfor * 0.999, "max": animalFosfor * 1.2 },
            "Sodyum": { "min": animalSodyum * 0.999, "max": animalSodyum * 1.1 },
            "Yag": { "min": animalYag * 0.999, "max": animalYag * 2 },
        },
        "variables": {},
        "options": {
            "tolerance": 0.05
        },
    }

for (i = 0; i < Constraint.length; i++) {
    model.constraints[Constraint[i].name] = { "min": 0, "max": Constraint[i].max };
}
for (i = 0; i < Variable.length; i++) {

    model.variables[Variable[i]] = {
        "Enerji": 85*Variable[i+1][2] ,
        "Hp": 10*Variable[i+1][1],
        "Meganizyum": 20*Variable[i+1][9],
        "LinoliekAsit":0.1* Variable[i+1][13],
        "Kalsiyum":0.1* Variable[i+1][6],
        "Fosfor": 0.3*Variable[i+1][7],
        "Sodyum": 14*Variable[i+1][10],
        "Yag": 0.7*Variable[i+1][12],
        "profit":10* Variable[i+1][14] };
    i++
}


results = solver.Solve(model);
console.log(Object.values(results));


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.onload = function() {


    var app = new Vue({
        el: '#app',
        mounted(){

        },
        data: {
            msg: results,
            keys: Object.keys(results),
            state: results.feasible,
            values:Object.values(results),
        },
    })
}
