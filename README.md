<p align="center"><a href="https://todosuru.tatzandpirz.com" target="_blank"><img src="https://svgshare.com/i/ubK.svg" width="400" alt="Todosuru Logo"></a></p>

## About Todosuru

Todosuru is a simple todo list API endpoint. Simple and easy to use.
- Laravel API as a backend.
- Vue.js as a frontend.



## Usage Todosuru
view all task[GET]:
{url}/api/task

view one task[GET]:
{url}/api/task/{id}

add a task[POST]:
{url}/api/task

params:
 - task
 - decription(optional)

update task details[PUT]:
{url}/api/task/{id}
params:
 - task(optional)
 - decription(optional)

mark as complete task[PUT]:
{url}/api/task/{id}/done

delete task[DELETE]:
{url}/api/delete/{id}/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).