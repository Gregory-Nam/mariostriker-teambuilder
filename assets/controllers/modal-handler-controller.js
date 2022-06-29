import { Controller } from '@hotwired/stimulus';


export default class extends Controller {
    static targets = ["modal", "modalBody", "form"];

    static values = {
        'formUrl': String,
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
        this.ajaxGet(this.formUrlValue).then(form=>{
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
        this.ajaxPut(this.formUrlValue, data)
            .then(res=> res.json())
            .then(data=>{
                if(data.status == "error") {
                    const errorSignUp = document.querySelector(".error-signup-alert");
                    if(errorSignUp != null) errorSignUp.remove();
                    const errorElem = document.createElement("div");
                    errorElem.classList.add("alert","alert-danger", "error-signup-alert");
                    errorElem.innerHTML = data.message;
                    this.modalBodyTarget.prepend(errorElem);
                    
                }
            })
    }
}
