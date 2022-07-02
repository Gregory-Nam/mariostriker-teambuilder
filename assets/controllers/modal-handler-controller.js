import { Controller } from '@hotwired/stimulus';


export default class extends Controller {
    static targets = ["modal", "modalBody", "form", "formLogin"];

    static values = {
        'signupUrl': String,
        'loginUrl': String,
    }

    /**
     * 
     * @param {String} url 
     * @returns Response text
     */
    async ajaxGet(url) {
        const response = await fetch(url);
        return response.text();
    }

    async ajaxPut(url,data){
        const response = await fetch(url,{
            method:"POST",
            body:data
        });
        return response;
    }

    /**
     * Click on signup
     */
    async signUpForm() {
        this.ajaxGet(this.signupUrlValue).then(form=>{
            this.modalBodyTarget.innerHTML = form;
        });
    }

    async loginForm(){
        this.ajaxGet(this.loginUrlValue).then(form=>{
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
        this.ajaxPut(this.signupUrl, data)
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
        this.ajaxPut(this.loginUrlValue, data)
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
}
