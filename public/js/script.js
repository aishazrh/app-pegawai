const body       = document.querySelector("body");
const sidebar    = body.querySelector(".sidebar");
const toggle     = body.querySelector(".toggle");
const searchBtn  = body.querySelector(".search-box");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText   = body.querySelector(".mode-text");

toggle.addEventListener("click", ()=> {
    sidebar.classList.toggle("close");
});

modeSwitch.addEventListener("click", ()=> {
    body.classList.toggle("dark");

    if(body.classList.contains("dark")) {
        modeText.innerText = "Light Mode"
    } else {
        modeText.innerText = "Dark Mode"
    }
});

function updateSalary(positionId) {
    var position = window.positions.find(pos => pos.id == positionId);

    if (position) {
        document.getElementById("salary").value = position.gaji_pokok;
    }
}

console.log(window.employees);
document.querySelector('form').addEventListener('submit', function(e) {
    console.log('Form is being submitted');
});

function updateEmployeeInfo() {
    const select = document.getElementById('karyawan_id');
    const employeeId = select.value;

    const employee = window.employees.find(emp => emp.id == employeeId);

    if (employee) {
        document.getElementById('employee_name').value = employee.nama_lengkap ?? '';
        document.getElementById('department').value = employee.department?.nama_departemen ?? '';
        document.getElementById('position').value = employee.position?.nama_jabatan ?? '';
        document.getElementById('salary').value = employee.position?.gaji_pokok ?? '';
    } else {
        document.getElementById('employee_name').value = '';
        document.getElementById('department').value = '';
        document.getElementById('position').value = '';
        document.getElementById('salary').value = '';
    }
}

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        updateEmployeeInfo();
    }, 50);
});

let formToSubmit = null;

            document.querySelectorAll(".btn-delete").forEach(button => {
                button.addEventListener("click", function () {
                    formToSubmit = this.closest("form");
                    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                    deleteModal.show();
                });
            });

            document.getElementById("confirmDeleteBtn").addEventListener("click", function () {
                if (formToSubmit) {
                    formToSubmit.submit();
                }
            });