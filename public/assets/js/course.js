const idInput = document.querySelector('#update-id');
const nameInput = document.querySelector('#update-name');
const descriptionInput = document.querySelector('#update-description');
const awardingBodyInput = document.querySelector('#updateAwardingBody');
const previousImageInput = document.querySelector('#previous-image');
const imageInput = document.querySelector('#updateImage');
const updateModal = document.querySelector('#updateModal');
const deleteModal = document.querySelector('#deleteModal');
const deleteModalDeleteBtn = document.querySelector('#delete-modal-delete-btn');
const updateForm = document.querySelector('#update-form');
const options = document.getElementsByClassName('option')
const updateImage = document.querySelector('#updateImage');

updateModal.addEventListener('show.bs.modal',event =>{
    let updateBtn = event.relatedTarget;
    let name = updateBtn.getAttribute('data-bs-name');
    let description = updateBtn.getAttribute('data-bs-description');
    let image = updateBtn.getAttribute('data-bs-image');
    let awarding = updateBtn.getAttribute('data-bs-awarding');
    let id = updateBtn.getAttribute('data-bs-id');

    console.log([...options]);

    [...options].forEach(option => {
        if(option.value == awarding){
            option.selected = true;
        }
    })

    console.log(awarding)
    updateForm.setAttribute('action',`/admin/course/update/${id}`);
    updateImage.setAttribute('src',`/storage/${image}`)

    nameInput.value = name;
    descriptionInput.value = description;
    previousImageInput.value = image;
    // awardingBodyInput.value =awarding;
    idInput.value = id;
})


deleteModal.addEventListener('show.bs.modal',event =>{
    let deleteBtn = event.relatedTarget;
    let name = deleteBtn.getAttribute('data-bs-name');
    let description = deleteBtn.getAttribute('data-bs-description');
    let id = deleteBtn.getAttribute('data-bs-id');

    deleteModalDeleteBtn.setAttribute('href',`/admin/course/delete/${id}`)
    document.querySelector('#delete-modal-body').innerText = `Do you want to delete ${name} course?`;
})
