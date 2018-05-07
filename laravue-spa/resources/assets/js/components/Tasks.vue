<template>
    <div>
        please <router-link to="/login">Login.</router-link>

        <div>
            <strong>Hello, Kazuya!</strong>
            <p>Your tasks here.</p>

            <ul>
                <li>
                    Learn Vue.js
                </li>
                <button class="btn btn-sm btn-success">Done</button>

                <button class="btn btn-sm btn-danger">Remove</button>
            </ul>

            <div class="form-group">
                <div class="alert alert-danger" role="alert">
                    Task name should not be blank.
                </div>
                <input type="text" class="form-control" placeholder="new task...">
                <button class="btn btn-primary">
                    Add task
                </button>
            </div>
        </div>
    </div>
</template>
