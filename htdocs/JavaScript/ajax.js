const ajaxs = document.querySelector("#createReview")
ajaxs.addEventListener("submit", async function(event){
    event.preventDefault();

    const inputName = document.querySelector("#author").value
    const inputDate = document.querySelector("#date").value
    const inputMessage = document.querySelector("#message").value
    const inputNote = document.querySelector("#note").value
    const inputSelect = document.querySelector("#id_tour_operator").value

    let formData = new FormData()
    
    formData.append("author", inputName)
    formData.append("date", inputDate)
    formData.append("message", inputMessage)
    formData.append("note", inputNote)
    formData.append("id_tour_operator", inputSelect)
    
    fetch("detailVoyage.php" , {
        method: "POST",
        body: formData
    
    }).then((response) => {
        return response.text()
    }).then((data) => {
        
        let creation = document.querySelector("#cardsReview")
        creation.innerHTML += `
        <div class="d-flex flex-wrap justify-content-around my-5" id="cardsReview">
        <div class="card shadow-lg border border-2 border-black rounded" style="width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title fs-3 mt-3 font">${inputName}</h5>
                    <img class="border border-5 rounded-circle" style="height: 70px;" src="./medias/logo_comparator_premium_seul.png">
                </div>
                <div class="text-center">
                    <h6 class="card-title fs-6">${inputDate}</h6>
                    <h5 class="card-subtitle mb-2 text-success fs-1  ">${inputNote}/10</h5>
                    <p class="card-text fst-italic fw-bold">${inputMessage}</p>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    
                </div>
            </div>
        </div>
    </div>
    `

    })
    
})