window.confirmDelete = (id, name, school) => {
    fillRobotConfirmDeleteModal(id, name, school);
    $("#confirmDeleteModal").modal('show');
};

document.getElementById("confirmDeleteModal").addEventListener("hide.bs.modal", () => {
    fillRobotConfirmDeleteModal(-1, null, null);
});

function fillRobotConfirmDeleteModal(id, name, school) {
    document.getElementById("robot_id_confirm_delete").innerText = id;
    document.getElementById("robot_name_confirm_delete").innerText = name;
    document.getElementById("robot_school_confirm_delete").innerText = school;
    document.getElementById("robot_form_confirm_delete").setAttribute('action', '/robot/' + id);
}