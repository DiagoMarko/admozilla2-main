//--------- SET || MAIN || VARIABLES || START ------------------>
let fa_bars                       = document.querySelector('.fa-bars');
let main                          = document.querySelector('main');
let fa_plus                       = document.querySelectorAll('.fa-plus');
let set_data_form                 = document.querySelector('.set_data_form');
let form_close                    = document.querySelectorAll('.form_close');
let fa_cog                        = document.querySelector('.fa-cog');
let cogs_bar                      = document.querySelector('.cogs_bar');
let cogs_bar_close                = document.querySelector('.cogs_bar_close');
let table_main_row                = document.querySelectorAll('.table .main_row');
let search_inp_2_search_icon      = document.querySelector('.search_inp_2 button')
let search_inp_2                  = document.querySelector('.search_inp_2')
let search_inp_2_input            = document.querySelectorAll('.search_inp_2 input');
let get_data_form                 = document.querySelectorAll('.get_data_form');
let get_data_form_2               = document.querySelector('.get_data_form_2');
let get_data_form_inp             = document.querySelectorAll('.get_data_form input');
let fa_repeat                     = document.querySelectorAll('.fa-repeat');
//--------- SET || MAIN || VARIABLES || END------------------>

//--------- SET || MAIN || EVENT || START ------------------>
fa_bars.addEventListener('click',() => {
    main.classList.toggle('active_main');
    cogs_bar.classList.remove('active_cog_bar');
})
fa_plus.forEach(s => s.addEventListener('click',() => {
    set_data_form.classList.add('active_form');
    cogs_bar.classList.remove('active_cog_bar');
}))
form_close[1].addEventListener('click',() => {
    set_data_form.classList.remove('active_form');
})
fa_cog.addEventListener('click',() => {
  cogs_bar.classList.add('active_cog_bar');
  main.classList.remove('active_main');
})
cogs_bar_close.addEventListener('click',() => {
    cogs_bar.classList.remove('active_cog_bar');
})
search_inp_2_search_icon.addEventListener('mouseenter',(e) => {
    e.preventDefault();
    search_inp_2.classList.add('active_search_inp_2');
    e.target.style.display = 'none';
})
search_inp_2_input[1].addEventListener('click',() => {
    get_data_form_2.classList.add('active_form');
})
form_close.forEach(s => s.addEventListener('click',() => {
    get_data_form.forEach(s => s.classList.remove('active_form'))
    set_data_form.classList.remove('active_form')
    get_data_form_2.classList.remove('active_form');
}))
//--------- SET || MAIN || EVENT || END------------------>


//-------------Active || Color || Ui || Start --------------------->
table_main_row.forEach((item,index) => {
    if(index % 2 == 0)
    {
        item.classList.add('active_color');
    }
})
//-------------Active || Color || Ui || End --------------------->
fa_repeat.forEach((s,index) => {
    s.addEventListener('click',() => {
        get_data_form[index].classList.add('active_form');
    })
})