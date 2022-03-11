$(document).ready(function() {
    const AJAX_OPTIONS = {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    };
    init();

    function init() {
        getAndRenderStudents();
        getAndRenderMajors();

    }

    function getAndRenderStudents() {
        getStudents().then(({
            data
        }) => {
            renderStudents(data.students);
        });
    }

    function getAndRenderStudent(id) {
        getStudent(id).then(({
            data
        }) => {
            renderStudent(data.student);
        });
    }

    function getAndRenderMajors() {
        getMajors().then(({
            data
        }) => {
            renderMajors(data.majors);
        });
    }
    //get students all
    function getStudents() {
        return $.ajax({
            url: "/api/ajax-students",
            method: "GET",
        })
    }
    //get student for id
    function getStudent(id) {
        return $.ajax({
            url: `/api/ajax-students/${id}`,
            method: "GET",
        })
    }
    //get major all
    function getMajors() {
        return $.ajax({
            url: "/api/majors",
            method: "GET",
        })
    }
    //get student and table append
    function renderStudents(students = []) {
        if (students.length) {
            let tbody = $("#studentTBody");
            tbody.html("");

            students.forEach(student => {
                let tr = "<tr>";
                let tds = {
                    td_id: `<td>${student.id}</td>`,
                    td_name: `<td>${student.name}</td>`,
                    td_email: `<td>${student.email}</td>`,
                    td_major: `<td>${student.major.name}</td>`,
                    td_date_of_birth: `<td>${student.date_of_birth}</td>`,
                    td_address: `<td>${student.address}</td>`,
                    td_actions: `<td>
                        <button class="btn show-form-modal" data-id="${ student.id }" data-type="EDIT"><i class="fas fa-edit text-primary"></i></button>
    <button data-id="${ student.id }"  class="btn delete-modal"><i class="fas fa-trash-alt text-danger"></i></button>
    </td>`,
                };

                for (var td in tds) {
                    if (tds.hasOwnProperty(td)) {
                        tr += tds[td];
                    }
                }

                tr += "</tr>";

                tbody.append(tr);
            });


        }
    }
    //form data
    function renderStudent(student) {
        $("#name").val(student.name);
        $("#email").val(student.email);
        $("#major_id").val(student.major_id);
        $(`#major_id option[value="${student.major_id}"]`).prop("selected", true).trigger("change");
        $("#date_of_birth").val(student.date_of_birth);
        $("#address").val(student.address);
    }
    //get majors and add select option
    function renderMajors(majors = []) {
        if (majors.length) {
            let select = $(".majors-select");
            select.html("");

            majors.forEach(major => {
                let option = `<option value="${major.id}">${major.name}</option>`;

                select.append(option);
            });
        }
    }
    //reset form data
    function resetModal() {
        $("#name").val("");
        $("#email").val("");
        $("#major_id").val("");
        $("#major_id option:first-child").prop("selected", true).trigger("change");
        $("#date_of_birth").val("");
        $("#address").val("");
        $(".form-error").text("");
    }
    //click and show modal
    $(document).on("click", ".show-form-modal", function() {
        $("#formModal").modal("show");

        resetModal();

        let type = $(this).data("type");
        let id = $(this).data("id");

        if (type === "CREATE") {
            AJAX_OPTIONS.url = "/api/ajax-students";
            AJAX_OPTIONS.method = "POST";

            $("#formModalLabel").text("Create Student");
            $("#formModalButton").text("Create Student");
        } else {
            AJAX_OPTIONS.url = `/api/ajax-students/${id}`;
            AJAX_OPTIONS.method = "PUT";

            $("#formModalLabel").text("Edit Student");
            $("#formModalButton").text("Update Student");

            getAndRenderStudent(id);
        }
    })
    //click delete and show modal
    $(document).on('click', '.delete-modal', function() {
        let id = $(this).data("id");
        $("#deleteModal").modal("show");
        $("#delete-confirm").data("id", id);
    });
    //delete data
    $("#delete-confirm").click(function() {
        let id = $(this).data("id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `/api/ajax-students/${id}`,
            method: "DELETE",
            success: function(res) {
                getAndRenderStudents();
                $("#deleteModal").modal('hide');
            }
        })
    })
    //when submit and form validation
    $("#form").on("submit", function(e) {
        e.preventDefault();
        let form_data = $("#form").serializeArray();
        let data = {};
        form_data.map(form_item => {
            data[form_item.name] = form_item.value;
        });
        $.ajax({
            ...AJAX_OPTIONS,
            data,
            success: function(res) {
                getAndRenderStudents();
                $("#formModal").modal('hide');
            },
            error: function(err) {
                if (err.status === 422) {
                    let errors = err.responseJSON.errors;

                    for (var error in errors) {
                        if (errors.hasOwnProperty(error)) {
                            $(`.form-error[data-error="${error}"]`).addClass("show")
                                .text("*" + errors[
                                    error]);
                        }
                    }
                }
            }
        })
    })

});
