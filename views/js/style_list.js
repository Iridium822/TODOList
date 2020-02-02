var taskId = null;
$(document).ready(function() {
    eventsBind();
    loadTasks();

})
function showTask(task) {
    if (taskId == 0) {
        $("#taskName").val("");
        $("#taskStatus").val("");
        $("#taskDescription").val("");
        $("#listComments").empty();
        $("#comments").hide()
    } else {
        $("#taskName").val(task.task_name);
        $("#taskStatus").val(task.task_status);
        $("#taskDescription").val(task.task_description);
        var list = $("#listComments");
        for (var i = 0; i < task.comments.length; i++)
        {
            list.append(task.comments[i].text_comment);
        }
        $("#comments").show();
    }
}

function editTask() {
    taskId = $(this).data("id");
    if (taskId == 0) {
        showTask();
        return false;
    }

    $.ajax({
        dataType: "json",
        method: "GET",
        cache: false,
        url: "../task/editTask/?id=" + taskId
    }).done(function(task) {
        showTask(task);
        $("#taskEdit").show();
        $("#taskList").hide();
    }).fail(function() {
        alert("Error");
    });

    return false;
}

function addComment() {
    $("#comment, #saveComment").show();
    $("#addComment").hide();
}

function saveComment() {
    var comment = {
        TaskId: taskId,
        Comment: $("#comment").val()
    }
    $.ajax({
        dataType: "json",
        method: "POST",
        data: comment,
        url: "saveTask.php"
    }).done(function() {
        $("#listComments").append(comment.Comment);
        $("#comment, #saveComment").hide();
        $("#addComment").show();
    }).fail(function() {
        alert("Error");
    });
}

function saveTask() {
    var task = {};
    task.task_id = taskId;
    task.task_name = $("#taskName").val();
    task.task_status = $("#taskStatus").val();
    task.task_description = $("#taskDescription").val();
    $.ajax({
        dataType: "json",
        method: "POST",
        data: task,
        url: "../task/saveTask/"
    }).done(function() {
        loadTasks();
        $("#taskEdit").show();
        $("#taskList").hide();
    }).fail(function() {
        alert("Error");
    });
}


function eventsBind() {
    $("#addTask").click(editTask);
    $("#addComment").click(addComment);
    $("#saveComment").click(saveComment);
    $("#saveTask").click(saveTask);
}

function showTasks(tasks) {
    var todoTasks = $("#taskTodo"),
        doingTasks = $("#taskDoing"),
        doneTasks = $("#taskDone");
    todoTasks.empty();
    doingTasks.empty();
    doneTasks.empty();
    for (var i=0; i < tasks.length; i++)
    {
        var task = tasks[i];
        var content;
        switch (task.task_status) {
            case "TODO":
                content = 	todoTasks;
                break;
            case "DOING":
                content = 	doingTasks;
                break;

            case "DONE":
                content = 	doneTasks;
                break;
        }
        content.append(
            "<div>" +
            "<a class='editTask' href='#' data-id='" + task.id_task + "'>" + task.task_name + "</a>" +
            "<span>(" + task.CountComments +  ")</span>" +
            "</div>"
        );
    }
}

function loadTasks() {
    $.ajax({
        dataType: "json",
        method: "GET",
        cache: false,
        url: "../task/getTasks/"
    }).done(function(tasks) {
        showTasks(tasks);
        $("#taskList .editTask").click(editTask);
    }).fail(function() {
        alert("Error");
    });
}



