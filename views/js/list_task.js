var taskId = null;
$(document).ready(function() {
    var url= window.location.href;
    if (url.indexOf("index/")>0){
        url = url.replace("index/","");
        window.location.href = url;

    }
    eventsBind();
    loadTasks();

})
function showTask(task) {
    if (taskId == 0) {
        $("#taskName").val("");
        $("#taskStatus").val("");
        $("#taskDescription").val("");
        $("#listComments").empty();
        $("#comments").hide();
    } else {
        $("#taskName").val(task.task_name);
        $("#taskStatus").val(task.task_status);
        $("#taskDescription").val(task.task_description);
        var list = $("#listComments");
        list.empty();
        for (var i = 0; i < task.comments.length; i++)
        {
            list.append("<li>" + task.comments[i].text_comment +"</li>");
        }
        $("#comments").show();
    }
    $("#taskEdit").show();
    $("#taskList").hide();
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
    }).fail(function() {
        alert("Error");
    });

    return false;
}

function addComment() {

    $("#comment, #saveComment").show();
    $('#comment').val("");

    $("#addComment").hide();
}

function saveComment() {
    var comment = {
        task_id: taskId,
        text_comment: $("#comment").val()
    }
    $.ajax({
        dataType: "json",
        method: "POST",
        data: comment,
        url: "../comment/saveComment/"
    }).done(function() {
        $("#listComments").append("<li>" + comment.text_comment + "</li>");

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
        $("#taskEdit").hide();
        $("#taskList").show();
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
            "<a class='editTask list-group-item list-group-item-action' href='#' data-id='" + task.id + "'>" + task.task_name  +
            "<span class='badge badge-primary badge-pill'>" + task.countComments +  "</span>" + "</a>" +
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



