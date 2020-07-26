/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const { default: Axios } = require("axios");

var animalTaurin = animal[0]['Taurin'] ;
var animalEnerji = animal[0]['Enerji'] ;
var animalFosfor = animal[0]['Fosfor'] ;
var animalHp = animal[0]['Hp'] ;
var animalKalsiyum = animal[0]['Kalsiyum'] ;
var animalLinoliekAsit = animal[0]['LinoliekAsit'] ;
var animalMeganizyum = animal[0]['Meganizyum'] ;
var animalSodyum = animal[0]['Sodyum'] ;
var animalYag = animal[0]['Yag'] ;
// Solve the model
var solver = require("javascript-lp-solver"),
    results,
    model = [

    ];


//Amaç Fonksiyonu (maliyet minimizasyonu)
var  row = `min: `
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][14]} ${Variable[j] } `
    j++
}
model.push(row)
//ham protein kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][1]} ${Variable[j] } `
    j++
}
row +=`>= ${animalHp } `
model.push(row)

//enerji kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][2]} ${Variable[j] } `
    j++
}
row +=`>= ${0.999*animalEnerji } `
model.push(row)

//enerji kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][2]} ${Variable[j] } `
    j++
}
row +=`<= ${1.2*animalEnerji } `
model.push(row)


//yağ kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][12]} ${Variable[j] } `
    j++
}
row +=`>= ${0.999*animalYag } `
model.push(row)

//yağ kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][12]} ${Variable[j] } `
    j++
}
row +=`<= ${2*animalYag } `
model.push(row)


////kalsiyum kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][6]} ${Variable[j] } `
    j++
}
row +=`>= ${animalKalsiyum } `
model.push(row)


////fosfor kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][7]} ${Variable[j] } `
    j++
}
row +=`>= ${animalFosfor } `
model.push(row)

//magnezyum kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][9]} ${Variable[j] } `
    j++
}
row +=`>= ${animalMeganizyum } `
model.push(row)

//Sodyum kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][10]} ${Variable[j] } `
    j++
}
row +=`>= ${animalSodyum } `
model.push(row)

//Taurin kısıtı
//row = ``
//for(let j=0;j<Variable.length;j++){
//   row += `${Variable[j+1][11]} ${Variable[j] } `
//   j++
//}
//row +=`>= ${animalTaurin } `
//model.push(row)
//Linoleik asit kısıtı
row = ``
for(let j=0;j<Variable.length;j++){
    row += `${Variable[j+1][13]} ${Variable[j] } `
    j++
}
row +=`>= ${animalLinoliekAsit } `
model.push(row)
    //fhgf hhytyu 545 7657 dfgh

//Kullanıcının elindeki hammaddelere ait kısıtlar
row = ``
for(let j=0;j<Constraint.length;j++){
    row = `1 ${Constraint[j].name } <= ${Constraint[j].max } `
    model.push(row)
}
console.log(model);
// Reformat to JSON model
model = solver.ReformatLP(model);
console.log(model);
results = solver.Solve(model);
console.log(results);
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
