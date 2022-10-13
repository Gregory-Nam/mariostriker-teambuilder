import { Controller } from '@hotwired/stimulus';


export class CustomController extends Controller {
    
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

}