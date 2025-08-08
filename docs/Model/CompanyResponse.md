# # CompanyResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique identifier for the company. |
**name** | **string** | The name of the company. |
**active** | **bool** | Indicates if the company is active. |
**account_status** | **string** | The current status of the company&#39;s account. |
**parent_company_id** | **string** | The identifier of the parent company, if any. | [optional]
**onboarding_status** | **string** | The current status of the company&#39;s onboarding process. |
**documents** | [**\Conekta\Model\CompanyResponseDocumentsInner[]**](CompanyResponseDocumentsInner.md) | A list of documents related to the company. |
**created_at** | **int** | Timestamp of when the company was created. |
**object** | **string** | The type of object, typically \&quot;company\&quot;. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
