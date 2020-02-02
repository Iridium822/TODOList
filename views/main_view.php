
<button id="addTask" data-id="0">Add</button>
<div id="taskList">
    <h2>TODO</h2>
    <div id="taskTodo">

    </div>
    <h2>DOING</h2>
    <div id="taskDoing">

    </div>
    <h2>DONE</h2>
    <div id="taskDone">

    </div>
</div>
<div id="taskEdit" style="display: none">
    <div>
        <label>Name:</label>
        <input id="taskName" />
    </div>
    <div>
        <label>Status:</label>
        <select id ="taskStatus">
            <option value="TODO">TODO</option>
            <option value="DOING">DOING</option>
            <option value="DONE">DONE</option>
        </select>
    </div>
    <div>
        <label>Description:</label>
        <textarea id="taskDescription" />
    </div>
    <div id="comments"></div>
    <h3>Comments</h3>
    <button id="addComment">Add</button>
    <button id="saveComment" style="display: none">Save</button>
    <textarea id="comment" style="display: none"></textarea>
    <ul id="listComments">

    </ul>
</div>
<button id="saveTask">Save</button>

</div>

