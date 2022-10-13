import { CustomController } from "./custom-controller.js";


export default class extends CustomController {
    static targets = ['selectorChangeCharacter', 'imageChar', 'force', 'vitesse', 'passe', 'tir', 'technique','force_diff', 'vitesse_diff', 'passe_diff', 'tir_diff', 'technique_diff', 'equipements', 'stats'];

    static values = {
        'personnages':Object,
        'forcestat':String,
        'url':String
    }


    connect(){

        this.equipements = {
            "Casque":Object,
            "Plastron":Object,
            "Gants":Object,
            "Chaussures":Object
        }

        this.lastChar = "";
    }


    changeData(){
        const idChar = this.selectorChangeCharacterTarget.value;

        
        const optionToEnable =  document.querySelectorAll(".selectChar option[value='"+this.lastChar+"']");
        for(const option of optionToEnable){
            option.disabled = false;
        }


        //  6 and 7 is toad and yoshi, they can be choosed multiple time
        if(idChar != 7 && idChar != 6) {
            const optionToDisable =  document.querySelectorAll(".selectChar option[value='"+idChar+"']");
            for(const option of optionToDisable){
                option.disabled = true;
            }
        }
        

        this.lastChar = idChar;
        super.ajaxGet(this.urlValue + "/personnages/"+idChar).then(data => {
            data = JSON.parse(data);
            this.imageCharTarget.src = "/images/characters/"+data.image;
        
            this.forceTarget.textContent = data.force;
            this.forceTarget.dataset.default = data.force;

            this.vitesseTarget.textContent =  data.vitesse;
            this.vitesseTarget.dataset.default =  data.vitesse;

            this.passeTarget.textContent =  data.passe;
            this.passeTarget.dataset.default =  data.passe;
            
            this.tirTarget.textContent =  data.tir;
            this.tirTarget.dataset.default =  data.tir;
            
            this.techniqueTarget.textContent = data.technique;
            this.techniqueTarget.dataset.default = data.technique;

            this.statsTarget.classList.remove("d-none");
            this.equipementsTarget.classList.remove("d-none");
        }) 
    }


    changeStat(event){
        const target = event.target;
        const idEquip = target.value;


        super.ajaxGet(this.urlValue + "/equipements/"+idEquip).then(data => {
            data = JSON.parse(data);

            this.equipements[data.categorie] = data;

            const diffStatsTotal = this.getDiffStatsTotal();

            this.forceTarget.textContent = parseInt(this.forceTarget.dataset.default) + diffStatsTotal.force;
            this.techniqueTarget.textContent = parseInt(this.techniqueTarget.dataset.default) + diffStatsTotal.technique;
            this.passeTarget.textContent = parseInt(this.passeTarget.dataset.default) + diffStatsTotal.passe;
            this.tirTarget.textContent = parseInt(this.tirTarget.dataset.default) + diffStatsTotal.tir;
            this.vitesseTarget.textContent = parseInt(this.vitesseTarget.dataset.default) + diffStatsTotal.vitesse;

            const passeDiff = this.formatDiff(parseInt(this.passeTarget.textContent) - parseInt(this.passeTarget.dataset.default));
            const tirDiff =   this.formatDiff(parseInt(this.tirTarget.textContent) - parseInt(this.tirTarget.dataset.default));
            const techniqueDiff = this.formatDiff(parseInt(this.techniqueTarget.textContent) - parseInt(this.techniqueTarget.dataset.default));
            const vitesseDiff = this.formatDiff(parseInt(this.vitesseTarget.textContent) - parseInt(this.vitesseTarget.dataset.default));
            const forceDiff = this.formatDiff(parseInt(this.forceTarget.textContent) - parseInt(this.forceTarget.dataset.default));

            this.passe_diffTarget.textContent = "(" + passeDiff  + ")";
            this.tir_diffTarget.textContent = "(" + tirDiff + ")";
            this.technique_diffTarget.textContent = "(" + techniqueDiff + ")";
            this.vitesse_diffTarget.textContent = "(" + vitesseDiff + ")";
            this.force_diffTarget.textContent = "(" + forceDiff  + ")";

        });
    }

    formatDiff(val){
        return val>=0 ? "+"+val : val;
    }

    getDiffStatsTotal(){
        let diffStatsTotal = {"force":0, "passe":0, "tir":0,"vitesse":0, "technique":0};
        for(const equipement of Object.values(this.equipements)){
            let currentCate;
            for(const [key, valeur] of Object.entries(equipement)){
                if(key=="categorie") 
                    currentCate = valeur;
                else
                    diffStatsTotal[key] += valeur;
            }

        }
        return diffStatsTotal;
    }


    teamValidator(){
        const characters = document.getElementsByClassName("backgroundSelectedChar");
        const teamName = document.getElementById("teamName").value;

        const team = {"teamName":teamName};
        let i = 0;
        for(const char of characters){
            const idChar = char.getElementsByClassName("selectChar")[0].value;
            const equipements = char.getElementsByClassName("equipSelect");
            if(idChar == '') {
                alert("Veuillez choisir un personnage pour chaque poste");
                return;
            }
            let idEquipements = [idChar];
            for(const equipement of equipements){
                idEquipements.push(equipement.value);
            }
            team[i] = idEquipements;
            ++i;
        }
        super.ajaxPut(this.urlValue + "/equippedChar", JSON.stringify(team))
        .then(res=> res.json())
        .then(data=>{
            alert(data.message);
        });


        
    }

    
}
