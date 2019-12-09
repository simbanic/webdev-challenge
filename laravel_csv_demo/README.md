I have to try to make backend Laravel architect robust, scalable and performance-oriented.

1. Try to enforce separation of concern by implementing Repository Pattern through repository interface. 
2. Data import is a CPU intensive and memory consuming task and it can impact the performance of the application. So this tasked is delegated to the background process - a job in Laravel. The job will insert data into chunks. It helps to insert multiple records in a few queries and also honor MySQL `max_allowed_packet` limit.

For the frontend, I have used bootstrap and jquery and ajax.
