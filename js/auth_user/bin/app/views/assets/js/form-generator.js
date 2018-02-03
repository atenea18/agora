/**
 * Created by trovaz on 22/06/2017.
 */


function Billing(id , className , action , submit , method) {
    this.inputs = [];
    if(arguments.length < 5){
        this.method = "post";

    }else{
        this.method = method;
    }

    this.id = id;
    this.action = action;
    this.submit = submit;
    this.className = className;
}

Billing.prototype.toString = function () {
    
};




function Input(name , value , id  , className ) {
    
}