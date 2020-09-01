/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

const { default: Axios } = require("axios");


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


global.bool == "true";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



window.onclick = function() {

    var animalTaurin = animal[0]['Taurin'] ;
    var animalEnerji = animal[0]['Enerji'] ;
    var animalFosfor = animal[0]['Fosfor'] ;
    var animalHp = animal[0]['Hp'] ;
    var animalKalsiyum = animal[0]['Kalsiyum'] ;
    var animalLinoliekAsit = animal[0]['LinoliekAsit'] ;
    var animalMeganizyum = animal[0]['Meganizyum'] ;
    var animalSodyum = animal[0]['Sodyum'] ;
    var animalYag = animal[0]['Yag'] ;
    //console.log(animalHp);


// Solve the model
    var solver = require("javascript-lp-solver"),
        results,
        model = [

        ];


//Amaç Fonksiyonu (maliyet minimizasyonu)
    var  row1 = `min: `
    for(let j=0;j<Variable.length;j++){
        row1 += `${Variable[j+1][14]} ${Variable[j] } `
        j++
    }
    model.push(row1)
//ham protein kısıtı
    var  row2 = ``
    for(let j=0;j<Variable.length;j++){
        row2 += `${Variable[j+1][1]} ${Variable[j] } `
        j++
    }
    row2 +=`>= ${animalHp } `
    model.push(row2)

//enerji kısıtı
    var  row3 = ``
    for(let j=0;j<Variable.length;j++){
        row3 += `${Variable[j+1][2]} ${Variable[j] } `
        j++
    }
    row3 +=`>= ${0.999*animalEnerji } `
    model.push(row3)

//enerji kısıtı
    var  row4 = ``
    for(let j=0;j<Variable.length;j++){
        row4 += `${Variable[j+1][2]} ${Variable[j] } `
        j++
    }
    row4 +=`<= ${1.2*animalEnerji } `
    model.push(row4)


//yağ kısıtı
    var  row5 = ``
    for(let j=0;j<Variable.length;j++){
        row5 += `${Variable[j+1][12]} ${Variable[j] } `
        j++
    }
    row5 +=`>= ${0.999*animalYag } `
    model.push(row5)

//yağ kısıtı
    var  row6= ``
    for(let j=0;j<Variable.length;j++){
        row6 += `${Variable[j+1][12]} ${Variable[j] } `
        j++
    }
    row6 +=`<= ${2*animalYag } `
    model.push(row6)


////kalsiyum kısıtı
    var  row7 = ``
    for(let j=0;j<Variable.length;j++){
        row7 += `${Variable[j+1][6]} ${Variable[j] } `
        j++
    }
    row7 +=`>= ${animalKalsiyum } `
    model.push(row7)


////fosfor kısıtı
    var  row8 = ``
    for(let j=0;j<Variable.length;j++){
        row8 += `${Variable[j+1][7]} ${Variable[j] } `
        j++
    }
    row8 +=`>= ${animalFosfor } `
    model.push(row8)

//magnezyum kısıtı
    var  row9  = ``
    for(let j=0;j<Variable.length;j++){
        row9 += `${Variable[j+1][9]} ${Variable[j] } `
        j++
    }
    row9 +=`>= ${animalMeganizyum } `
    model.push(row9)

//Sodyum kısıtı
    var  row10  = ``
    for(let j=0;j<Variable.length;j++){
        row10 += `${Variable[j+1][10]} ${Variable[j] } `
        j++
    }
    row10 +=`>= ${animalSodyum } `
    model.push(row10)

//Taurin kısıtı
//row = ``
//for(let j=0;j<Variable.length;j++){
//   row += `${Variable[j+1][11]} ${Variable[j] } `
//   j++
//}
//row +=`>= ${animalTaurin } `
//model.push(row)
//Linoleik asit kısıtı
    var  row11 = ``
    for(let j=0;j<Variable.length;j++){
        row11 += `${Variable[j+1][13]} ${Variable[j] } `
        j++
    }
    row11 +=`>= ${animalLinoliekAsit } `
    model.push(row11)
    //fhgf hhytyu 545 7657 dfgh

//Kullanıcının elindeki hammaddelere ait kısıtlar
    var  row12  = ``
    for(let j=0;j<Constraint.length;j++){
        row12 = `1 ${Constraint[j].name } <= ${Constraint[j].max } `
        model.push(row12)
    }
   // console.log(model);
// Reformat to JSON model
    model = solver.ReformatLP(model);
   // console.log(model);
    results = solver.Solve(model);
    //console.log(results);
  //  console.log("sdfsd");



    // Output: "This can be accessed anywhere!"
    var app = new Vue({
        el: '#app',
        mounted(){

        },
        data: {
            msg: results,

            keys: Object.keys(results),
            state: results.feasible,
            values:Object.values(results),
            persons: results
        },




    })

    global.sonuc = app.$data;







}
