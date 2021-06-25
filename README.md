## How to get the application running

Work in progress

### Filling in the data

To fill in the demo data, use the following command: `php artisan db:seed`

***

## How to use the application?

To add a new car, you can press `Add New Car` button at the top right of the application.

It will open a form where you can fill in information about the car. The required information to create a car is:

- Brand
- Model
- Fuel tank capacity
- Fuel type
- Price
- Max speed

Other information is optional. To add a car to the database, click `Submit` button. You will be redirected back to the main page and should see `Car created successfully` message.

In the main page of the application you will see a list of all the cars in the database. Next to each car entry there are four action buttons:

- Show (Shows all the information about that car in a new window)
- Update price (Opens a form which allows changing the price only)
- Edit (Opens a form which allows changing all the information about the car)
- Delete (Deletes car from database)

Also, in the main page of the application it is possible to filter the list of cars by transmission and fuel type. You can select one or both options and click `Filter` button to see a list of cars with those specific selected criteria.

Lastly, there is a search field in which you can enter any string and it will show a list of car where this string is contained in the brand, model or description of the car after pressing the `Search` button. If sorting by specific field is selected, results of the search will be ordered by that field in ascending order,

### API

You can get all the information about a specific car using an ID by sending a GET request to this API endpoint `localhost:8000/api/cars/{id}`