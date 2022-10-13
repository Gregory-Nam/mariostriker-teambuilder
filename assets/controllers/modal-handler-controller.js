import { CustomController } from "./custom-controller.js";


export default class extends CustomController {
    static targets = ["modal", "modalBody", "form", "formLogin"];

    static values = {
        'signupUrl': String,
        'loginUrl': String,
    }


    /**
     * Click on signup
     */
    async signUpForm() {
        super.ajaxGet(this.signupUrlValue).then(form=>{
            this.modalBodyTarget.innerHTML = form;
        });
    }

    async loginForm(){
        console.log("hello");
        console.log(this.modalBodyTarget);
        super.ajaxGet(this.loginUrlValue).then(form=>{
            this.modalBodyTarget.innerHTML = form;
        });
    }

    /**
     * SignUp Form submitting
     * @param {SubmitEvent} event 
     */
    validation(event){
        event.preventDefault();
        const data = new FormData(this.formTarget);
        console.log(this.signupUrlValue);
        super.ajaxPut(this.signupUrlValue, data)
            .then(res=> res.json())
            .then(data=>{
                if(data.status == "error") {
                    this.modalBodyTarget.prepend(this.createAlertMessage(data.message, "signup-alert","alert","alert-danger"));
                }
                else {
                    this.modalBodyTarget.prepend(this.createAlertMessage("Inscription validé", "signup-alert","alert","alert-success"));
                }
            })
    }

    validationLogin(event){
        event.preventDefault();
        const data = new FormData(this.formLoginTarget);
        super.ajaxPut(this.loginUrlValue, data)
            .then(res => {if(res.status == 401) return res.json(); else if(res.status == 200) window.location.reload()})
            .then(data=>{
                this.modalBodyTarget.prepend(this.createAlertMessage(data.message, "signup-alert","alert","alert-danger"));
            });
    }

    createAlertMessage(message, id,...classList){
        const elemExisting = document.getElementById(id);
        if(elemExisting) elemExisting.remove();
        // create and return elem
        const alertElem = document.createElement("div");
        alertElem.classList.add(...classList);
        alertElem.id = id;
        alertElem.innerHTML = message;
        return alertElem;
    }

    connect() {
        console.log("Hello, Stimulus!", this.element)
      }     
}
