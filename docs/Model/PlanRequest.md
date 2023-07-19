# # PlanRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** | The amount in cents that will be charged on the interval specified. |
**currency** | **string** | ISO 4217 for currencies, for the Mexican peso it is MXN/USD | [optional]
**expiry_count** | **int** | Number of repetitions of the frequency NUMBER OF CHARGES TO BE MADE, considering the interval and frequency, this evolves over time, but is subject to the expiration count. | [optional]
**frequency** | **int** | Frequency of the charge, which together with the interval, can be every 3 weeks, every 4 months, every 2 years, every 5 fortnights |
**id** | **string** | internal reference id | [optional]
**interval** | **string** | The interval of time between each charge. |
**name** | **string** | The name of the plan. |
**trial_period_days** | **int** | The number of days the customer will have a free trial. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
