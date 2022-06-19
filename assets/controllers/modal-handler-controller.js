import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
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
        this.ajaxPut(this.formUrlValue, data).then(res=>console.log(res)).catch(error=>console.log(error));
    }
}
