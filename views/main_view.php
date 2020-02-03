<div id="taskList" class="container">
    <div id="logout"><a href="logout/"><strong>Logout</strong></a></div>
    <h4>Tasks List</h4>
    <button id="addTask" data-id="0" class="btn btn-primary">Add new task</button>

    <div class="row">
        <div class="col-sm">
         <h5>ToDo</h5>
            <div id="taskTodo" class="list-group">
            </div>
        </div>
        <div class="col-sm">
            <h5>Doing</h5>
            <div id="taskDoing" >
            </div>
        </div>
        <div class="col-sm">
            <h5>Done</h5>
            <div id="taskDone" class="col-sm">
            </div>
        </div>
    </div>
</div>
<div id="taskEdit" style="display: none" class="col-sm-6">
    <div class="form-group">
        <label>Name task:</label>
        <input id="taskName" class="form-control" />
    </div>
    <div class="form-group">
        <label>Status task:</label>
        <select id ="taskStatus" class="form-control">
            <option value="TODO">TODO</option>
            <option value="DOING">DOING</option>
            <option value="DONE">DONE</option>
        </select>
    </div>
    <div class="form-group">
        <label>Description Task:</label>
        <textarea id="taskDescription" class="form-control"></textarea>
    </div>
    <button id="saveTask" class="btn-primary">Save task</button>
    <div id="comments" class="form-group">
        <h3>Comments</h3>
        <button id="addComment" class="btn-primary">Add new comment</button>
        <button id="saveComment" style="display: none" class="btn-primary">Save comment</button>
        <textarea id="comment" style="display: none" class="form-control"></textarea>
        <ul id="listComments">

        </ul>
    </div>
</div>

