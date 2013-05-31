/* script that adds url inputted into textbox into database
   table corresponding to specific users */

/* 0 as method returns array, just need first index as rest are null */
var something = document.getElementsByName('site_input')[0].value;
if(something){
    document.write(something);
};
document.write("["+something+"]");
