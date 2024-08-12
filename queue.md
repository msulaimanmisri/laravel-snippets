## Queue Worker
This will run the queue. But will not automatically fetch the new changes
```
php artisan queue:work
```
## Queue Listen
This will run just like `queue:work`. But will automatically fetch the changes
```
php artisan queue:listen
```

## Queue or Listen?
If you are in the `Development` environment, use `queue:listen`. If in `Production`, use `queue:work`. The different between these two is, `queue:work` will use less resource in the server. Because `queue:work` will not restart the script. But `queue:listen` will use more resources

## Handling failed Queue
Use this command to handle the spesific failed queue
```
php artisan queue:retry {job_uuid} // find the uuid inside the `failed_jobs` table
```

Should you want re-queue all the failed job, use this command
```
php artisan queue:retry all
```

## Run the queue for certain numbers before failed
Use this command to cater this issue
```
php artisan queue:work --tries=3
```
```
php artisan queue:listen --tries=3
```

Or you can use the property inside the mailing class. Use `protected $tries = 10`. So the system will iterate 10 times per queue job if the first iteration failed.

## Monitor Failed Jobs
There's several way you can use to monitor your failed jobs. Here's the lists
* Laravel Horizon
* Laravel Pulse
* Custom Event-Listener
* Spatie Laravel-failed-job-monitor package
* Full-blown error logger: BugSnag

