const idInput = document.querySelector('#update-id');
const nameInput = document.querySelector('#update-name');
const descriptionInput = document.querySelector('#update-description');
const updateModal = document.querySelector('#updateModal');
const deleteModal = document.querySelector('#deleteModal');
const deleteModalDeleteBtn = document.querySelector('#delete-modal-delete-btn');
const updateForm = document.querySelector('#update-form');

updateModal.addEventListener('show.bs.modal',event =>{
    let updateBtn = event.relatedTarget;
    let name = updateBtn.getAttribute('data-bs-name');
    let description = updateBtn.getAttribute('data-bs-description');
    let id = updateBtn.getAttribute('data-bs-id');

    updateForm.setAttribute('action',`/admin/awarding-body/update/${id}`);

    nameInput.value = name;
    descriptionInput.value = description;
    idInput.value = id;
})


deleteModal.addEventListener('show.bs.modal',event =>{
    let deleteBtn = event.relatedTarget;
    let name = deleteBtn.getAttribute('data-bs-name');
    let description = deleteBtn.getAttribute('data-bs-description');
    let id = deleteBtn.getAttribute('data-bs-id');

    deleteModalDeleteBtn.setAttribute('href',`/admin/awarding-body/delete/${id}`)
    document.querySelector('#delete-modal-body').innerText = `Do you want to delete ${name} awarding body`;
})
