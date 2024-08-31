# php-core/abaninja-sdk

## AbaNinja.ch PHP SDK

## Install

Install package with composer

```
composer require php-core/abaninja-sdk
```

In your PHP code, load library

```php
require_once __DIR__ . '/vendor/autoload.php';
use PHPCore\AbaNinja\AbaNinja;
```

## Usage example

```php
require_once __DIR__ . '/vendor/autoload.php';
use PHPCore\AbaNinja\AbaNinja;

...

$person = AbaNinja::AddressesApi()->getPerson($personUuid);

```

## Current coverage

### Addresses

| [Addresses](https://abaninja.ch/apidocs/#tag/Addresses)                                                                                                                   | ◐ |
|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Check if the customerNumber already in use or not](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1check-customer-number/get) | ✅ |
| [Get a list of company addresses for given account](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1companies/get)             | ✅ |
| [Single company](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1companies~1{companyUuid}/get)                                 | ✅ |
| [Single company update](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1companies~1{companyUuid}/patch)                        | ❌ |
| [Delete company](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1companies~1{companyUuid}/delete)                              | ❌ |
| [Get a list of person addresses for given account](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1persons/get)                | ✅ |
| [Single person access](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1persons~1{personUuid}/get)                              | ✅ |
| [Single person update](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1persons~1{personUuid}/patch)                            | ❌ |
| [Delete person](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1persons~1{personUuid}/delete)                                  | ❌ |
| [Create new address for given account](https://abaninja.ch/apidocs/#tag/Addresses/paths/~1accounts~1{accountUuid}~1addresses~1v2~1addresses/post)                         | ❌ |

---

### Documents

| [DocumentsQuotes](https://abaninja.ch/apidocs/#tag/DocumentsQuotes)                                                                                                                        | ◐ |
|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Quotes List](https://abaninja.ch/apidocs/#tag/DocumentsQuotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1quotes/get)                                                                 | ✅ |
| [Create a quote](https://abaninja.ch/apidocs/#tag/DocumentsQuotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1quotes/post)                                                             | ❌ |
| [Existing quote](https://abaninja.ch/apidocs/#tag/DocumentsQuotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1quotes~1{documentUuid}/get)                                              | ✅ |
| [Update a quote](https://abaninja.ch/apidocs/#tag/DocumentsQuotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1quotes~1{documentUuid}/patch)                                            | ❌ |
| [Actions for an existing quote](https://abaninja.ch/apidocs/#tag/DocumentsQuotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1quotes~1{documentUuid}~1actions/get)                      | ✅ |
| [Execute an action on an existing quote](https://abaninja.ch/apidocs/#tag/DocumentsQuotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1quotes~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsContractNotes](https://abaninja.ch/apidocs/#tag/DocumentsContractNotes)                                                                                                                                 | ◐ |
|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Contract Notes List](https://abaninja.ch/apidocs/#tag/DocumentsContractNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1contract-notes/get)                                                                 | ✅ |
| [Create contract note](https://abaninja.ch/apidocs/#tag/DocumentsContractNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1contract-notes/post)                                                               | ❌ |
| [Existing contract note](https://abaninja.ch/apidocs/#tag/DocumentsContractNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1contract-notes~1{documentUuid}/get)                                              | ✅ |
| [Update contract note](https://abaninja.ch/apidocs/#tag/DocumentsContractNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1contract-notes~1{documentUuid}/patch)                                              | ❌ |
| [Actions for an existing contract note](https://abaninja.ch/apidocs/#tag/DocumentsContractNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1contract-notes~1{documentUuid}~1actions/get)                      | ✅ |
| [Execute an action on an existing contract note](https://abaninja.ch/apidocs/#tag/DocumentsContractNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1contract-notes~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsDeliveryNotes](https://abaninja.ch/apidocs/#tag/DocumentsDeliveryNotes)                                                                                                                                 | ◐ |
|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Delivery Notes List](https://abaninja.ch/apidocs/#tag/DocumentsDeliveryNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1delivery-notes/get)                                                                 | ✅ |
| [Create delivery note](https://abaninja.ch/apidocs/#tag/DocumentsDeliveryNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1delivery-notes/post)                                                               | ❌ |
| [Existing delivery note](https://abaninja.ch/apidocs/#tag/DocumentsDeliveryNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1delivery-notes~1{documentUuid}/get)                                              | ✅ |
| [Update delivery note](https://abaninja.ch/apidocs/#tag/DocumentsDeliveryNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1delivery-notes~1{documentUuid}/patch)                                              | ❌ |
| [Actions for an existing delivery note](https://abaninja.ch/apidocs/#tag/DocumentsDeliveryNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1delivery-notes~1{documentUuid}~1actions/get)                      | ✅ |
| [Execute an action on an existing delivery note](https://abaninja.ch/apidocs/#tag/DocumentsDeliveryNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1delivery-notes~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsInvoices](https://abaninja.ch/apidocs/#tag/DocumentsInvoices)                                                                                                                          | ◐ |
|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Invoices List](https://abaninja.ch/apidocs/#tag/DocumentsInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1invoices/get)                                                                 | ✅ |
| [Create invoice](https://abaninja.ch/apidocs/#tag/DocumentsInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1invoices/post)                                                               | ❌ |
| [Existing invoice](https://abaninja.ch/apidocs/#tag/DocumentsInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1invoices~1{documentUuid}/get)                                              | ✅ |
| [Update invoice](https://abaninja.ch/apidocs/#tag/DocumentsInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1invoices~1{documentUuid}/patch)                                              | ❌ |
| [Actions for an existing invoice](https://abaninja.ch/apidocs/#tag/DocumentsInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1invoices~1{documentUuid}~1actions/get)                      | ✅ |
| [Execute an action on an existing invoice](https://abaninja.ch/apidocs/#tag/DocumentsInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1invoices~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsInvoicesImported](https://abaninja.ch/apidocs/#tag/DocumentsInvoicesImported)                                                                                       | ✅ |
|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Create an imported invoice (PDF existing)](https://abaninja.ch/apidocs/#tag/DocumentsInvoicesImported/paths/~1accounts~1{accountUuid}~1documents~1v2~1invoices~1import/post) | ❌ |

| [DocumentsCreditNotes](https://abaninja.ch/apidocs/#tag/DocumentsCreditNotes)                                                                                                                               | ◐ |
|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Credit Notes List](https://abaninja.ch/apidocs/#tag/DocumentsCreditNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1credit-notes/get)                                                                 | ✅ |
| [Create credit note](https://abaninja.ch/apidocs/#tag/DocumentsCreditNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1credit-notes/post)                                                               | ❌ |
| [Existing credit note](https://abaninja.ch/apidocs/#tag/DocumentsCreditNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1credit-notes~1{documentUuid}/get)                                              | ✅ |
| [Update credit note](https://abaninja.ch/apidocs/#tag/DocumentsCreditNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1credit-notes~1{documentUuid}/patch)                                              | ❌ |
| [Actions for an existing credit note](https://abaninja.ch/apidocs/#tag/DocumentsCreditNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1credit-notes~1{documentUuid}~1actions/get)                      | ✅ |
| [Execute an action on an existing credit note](https://abaninja.ch/apidocs/#tag/DocumentsCreditNotes/paths/~1accounts~1{accountUuid}~1documents~1v2~1credit-notes~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsRecurringInvoices](https://abaninja.ch/apidocs/#tag/DocumentsRecurringInvoices)                                                                                                                                     | ◐ |
|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Recurring Invoices List](https://abaninja.ch/apidocs/#tag/DocumentsRecurringInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1recurring-invoices/get)                                                                 | ✅ |
| [Create recurring invoice](https://abaninja.ch/apidocs/#tag/DocumentsRecurringInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1recurring-invoices/post)                                                               | ❌ |
| [Existing recurring invoice](https://abaninja.ch/apidocs/#tag/DocumentsRecurringInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1recurring-invoices~1{documentUuid}/get)                                              | ✅ |
| [Update recurring invoice](https://abaninja.ch/apidocs/#tag/DocumentsRecurringInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1recurring-invoices~1{documentUuid}/patch)                                              | ❌ |
| [Actions for an existing recurring invoice](https://abaninja.ch/apidocs/#tag/DocumentsRecurringInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1recurring-invoices~1{documentUuid}~1actions/get)                      | ✅ |
| [Execute an action on an existing recurring invoice](https://abaninja.ch/apidocs/#tag/DocumentsRecurringInvoices/paths/~1accounts~1{accountUuid}~1documents~1v2~1recurring-invoices~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsTemplates](https://abaninja.ch/apidocs/#tag/DocumentsTemplates)                                                                                                                           | ◐ |
|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Templates List](https://abaninja.ch/apidocs/#tag/DocumentsTemplates/paths/~1accounts~1{accountUuid}~1documents~1v2~1templates/get)                                                                 | ✅ |
| [Create template](https://abaninja.ch/apidocs/#tag/DocumentsTemplates/paths/~1accounts~1{accountUuid}~1documents~1v2~1templates/post)                                                               | ❌ |
| [Existing template](https://abaninja.ch/apidocs/#tag/DocumentsTemplates/paths/~1accounts~1{accountUuid}~1documents~1v2~1templates~1{documentUuid}/get)                                              | ✅ |
| [Update template](https://abaninja.ch/apidocs/#tag/DocumentsTemplates/paths/~1accounts~1{accountUuid}~1documents~1v2~1templates~1{documentUuid}/patch)                                              | ❌ |
| [List template actions](https://abaninja.ch/apidocs/#tag/DocumentsTemplates/paths/~1accounts~1{accountUuid}~1documents~1v2~1templates~1{documentUuid}~1actions/get)                                 | ✅ |
| [Execute an action on an existing template](https://abaninja.ch/apidocs/#tag/DocumentsTemplates/paths/~1accounts~1{accountUuid}~1documents~1v2~1templates~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsReceipts](https://abaninja.ch/apidocs/#tag/DocumentsReceipts)                                                                                                                          | ◐ |
|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Receipts List](https://abaninja.ch/apidocs/#tag/DocumentsReceipts/paths/~1accounts~1{accountUuid}~1documents~1v2~1receipts/get)                                                                 | ✅ |
| [Actions for an existing receipt](https://abaninja.ch/apidocs/#tag/DocumentsReceipts/paths/~1accounts~1{accountUuid}~1documents~1v2~1receipts~1{documentUuid}~1actions/get)                      | ✅ |
| [Execute an action on an existing receipt](https://abaninja.ch/apidocs/#tag/DocumentsReceipts/paths/~1accounts~1{accountUuid}~1documents~1v2~1receipts~1{documentUuid}~1actions~1{action}/patch) | ❌ |

| [DocumentsQueue](https://abaninja.ch/apidocs/#tag/DocumentsQueue)                                                                        | ✅ |
|------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Existing queue](https://abaninja.ch/apidocs/#tag/DocumentsQueue/paths/~1accounts~1{accountUuid}~1documents~1v2~1queue~1{queueUuid}/get) | ✅ |

---

### Finances

| [FinancesBankAccounts](https://abaninja.ch/apidocs/#tag/FinancesBankAccounts)                                                                                       | ❌ |
|---------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [List of bank accounts](https://abaninja.ch/apidocs/#tag/FinancesBankAccounts/paths/~1accounts~1{accountUuid}~1finances~1v2~1bank-accounts/get)                     | ✅ |
| [Create bank account](https://abaninja.ch/apidocs/#tag/FinancesBankAccounts/paths/~1accounts~1{accountUuid}~1finances~1v2~1bank-accounts/post)                      | ❌ |
| [Single bank account](https://abaninja.ch/apidocs/#tag/FinancesBankAccounts/paths/~1accounts~1{accountUuid}~1finances~1v2~1bank-accounts~1{bankAccountUuid}/get)    | ✅ |
| [Update bank account](https://abaninja.ch/apidocs/#tag/FinancesBankAccounts/paths/~1accounts~1{accountUuid}~1finances~1v2~1bank-accounts~1{bankAccountUuid}/patch)  | ❌ |
| [Remove bank account](https://abaninja.ch/apidocs/#tag/FinancesBankAccounts/paths/~1accounts~1{accountUuid}~1finances~1v2~1bank-accounts~1{bankAccountUuid}/delete) | ❌ |

---

### Products

| [Products](https://abaninja.ch/apidocs/#tag/Products)                                                                                                                                 | ❌ |
|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Products List](https://abaninja.ch/apidocs/#tag/Products/paths/~1accounts~1{accountUuid}~1products~1v2~1products/get)                                                                | ❌ |
| [Create a new product](https://abaninja.ch/apidocs/#tag/Products/paths/~1accounts~1{accountUuid}~1products~1v2~1products/post)                                                        | ❌ |
| [Get an existing product](https://abaninja.ch/apidocs/#tag/Products/paths/~1accounts~1{accountUuid}~1products~1v2~1products~1{productUuid}/get)                                       | ❌ |
| [Update an existing product](https://abaninja.ch/apidocs/#tag/Products/paths/~1accounts~1{accountUuid}~1products~1v2~1products~1{productUuid}/patch)                                  | ❌ |
| [Remove an existing product](https://abaninja.ch/apidocs/#tag/Products/paths/~1accounts~1{accountUuid}~1products~1v2~1products~1{productUuid}/delete)                                 | ❌ |
| [Available actions for an existing product](https://abaninja.ch/apidocs/#tag/Products/paths/~1accounts~1{accountUuid}~1products~1v2~1{productUuid}~1actions/get)                      | ❌ |
| [Execute an action on an existing product](https://abaninja.ch/apidocs/#tag/Products/paths/~1accounts~1{accountUuid}~1products~1v2~1products~1{productUuid}~1actions~1{action}/patch) | ❌ |

---

### ProductGroups

| [ProductGroups](https://abaninja.ch/apidocs/#tag/ProductGroups)                                                                                                            | ❌ |
|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Product groups List](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups/get)                                    | ❌ |
| [Create a new product group](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups/post)                            | ❌ |
| [Check product group number](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups~1check-group-number/get)         | ❌ |
| [single product group](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups~1{groupUuid}/get)                      | ❌ |
| [Update product group](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups~1{groupUuid}/patch)                    | ❌ |
| [Delete product group](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups~1{groupUuid}/delete)                   | ❌ |
| [Archive product group](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups~1{groupUuid}~1actions~1archive/patch) | ❌ |
| [Restore product group](https://abaninja.ch/apidocs/#tag/ProductGroups/paths/~1accounts~1{accountUuid}~1products~1v2~1product-groups~1{groupUuid}~1actions~1restore/patch) | ❌ |

---

### Units

| [Units](https://abaninja.ch/apidocs/#tag/Units)                                                                                  | ❌ |
|----------------------------------------------------------------------------------------------------------------------------------|---|
| [Units List](https://abaninja.ch/apidocs/#tag/Units/paths/~1accounts~1{accountUuid}~1units~1v2~1units/get)                       | ❌ |
| [Create a new unit](https://abaninja.ch/apidocs/#tag/Units/paths/~1accounts~1{accountUuid}~1units~1v2~1units/post)               | ❌ |
| [Single Unit](https://abaninja.ch/apidocs/#tag/Units/paths/~1accounts~1{accountUuid}~1units~1v2~1units~1{unitUuid}/get)          | ❌ |
| [Single unit update](https://abaninja.ch/apidocs/#tag/Units/paths/~1accounts~1{accountUuid}~1units~1v2~1units~1{unitUuid}/patch) | ❌ |
| [Delete unit](https://abaninja.ch/apidocs/#tag/Units/paths/~1accounts~1{accountUuid}~1units~1v2~1units~1{unitUuid}/delete)       | ❌ |

---

### Time

| [Employee](https://abaninja.ch/apidocs/#tag/Employee)                                                                                    | ❌ |
|------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Employee List](https://abaninja.ch/apidocs/#tag/Employee/paths/~1accounts~1{accountUuid}~1time~1v2~1employees/get)                      | ❌ |
| [Create new employee](https://abaninja.ch/apidocs/#tag/Employee/paths/~1accounts~1{accountUuid}~1time~1v2~1employees/post)               | ❌ |
| [Available Users](https://abaninja.ch/apidocs/#tag/Employee/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1available-users/get)   | ❌ |
| [Single employee](https://abaninja.ch/apidocs/#tag/Employee/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}/get)    | ❌ |
| [Update employee](https://abaninja.ch/apidocs/#tag/Employee/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}/patch)  | ❌ |
| [Remove employee](https://abaninja.ch/apidocs/#tag/Employee/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}/delete) | ❌ |

| [EmployeeGroups](https://abaninja.ch/apidocs/#tag/EmployeeGroups)                                                                                               | ❌ |
|-----------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [List employee groups](https://abaninja.ch/apidocs/#tag/EmployeeGroups/paths/~1accounts~1{accountUuid}~1time~1v2~1employee-groups/get)                          | ❌ |
| [Create employee group](https://abaninja.ch/apidocs/#tag/EmployeeGroups/paths/~1accounts~1{accountUuid}~1time~1v2~1employee-groups/post)                        | ❌ |
| [Single employee group](https://abaninja.ch/apidocs/#tag/EmployeeGroups/paths/~1accounts~1{accountUuid}~1time~1v2~1employee-groups~1{employeeGroupUuid}/get)    | ❌ |
| [Update employee group](https://abaninja.ch/apidocs/#tag/EmployeeGroups/paths/~1accounts~1{accountUuid}~1time~1v2~1employee-groups~1{employeeGroupUuid}/patch)  | ❌ |
| [Remove employee group](https://abaninja.ch/apidocs/#tag/EmployeeGroups/paths/~1accounts~1{accountUuid}~1time~1v2~1employee-groups~1{employeeGroupUuid}/delete) | ❌ |

| [EmployeeInOut](https://abaninja.ch/apidocs/#tag/EmployeeInOut)                                                                                                              | ❌ |
|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Create In&Out Entry](https://abaninja.ch/apidocs/#tag/EmployeeInOut/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1in-out/post)                      | ❌ |
| [List not closed In&Out entries](https://abaninja.ch/apidocs/#tag/EmployeeInOut/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1in-out~1open-days/get) | ❌ |
| [Single In&Out entry](https://abaninja.ch/apidocs/#tag/EmployeeInOut/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1in-out~1{inOutUuid}/get)          | ❌ |
| [Update In&Out entry](https://abaninja.ch/apidocs/#tag/EmployeeInOut/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1in-out~1{inOutUuid}/patch)        | ❌ |
| [Remove In&Out entry](https://abaninja.ch/apidocs/#tag/EmployeeInOut/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1in-out~1{inOutUuid}/delete)       | ❌ |

| [EmployeeActivities](https://abaninja.ch/apidocs/#tag/EmployeeActivities)                                                                                                               | ❌ |
|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Create activity](https://abaninja.ch/apidocs/#tag/EmployeeActivities/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1activities/post)                            | ❌ |
| [Single employee activity](https://abaninja.ch/apidocs/#tag/EmployeeActivities/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1activities~1{activityUuid}/get)    | ❌ |
| [Update employee activity](https://abaninja.ch/apidocs/#tag/EmployeeActivities/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1activities~1{activityUuid}/patch)  | ❌ |
| [Remove employee activity](https://abaninja.ch/apidocs/#tag/EmployeeActivities/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1activities~1{activityUuid}/delete) | ❌ |

| [EmployeeTimeSettings](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings)                                                                                                                                 | ❌ |
|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [List contracts from employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1contracts/get)                                     | ❌ |
| [Create contract for employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1contracts/post)                                    | ❌ |
| [Allowed contract days](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1contracts~1allowed-days/get)                              | ❌ |
| [Last contract](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1contracts~1last-contract/get)                                     | ❌ |
| [Single contract from employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1contracts~1{contractUuid}/get)                    | ❌ |
| [Update contract from employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1contracts~1{contractUuid}/patch)                  | ❌ |
| [Remove contract from employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1contracts~1{contractUuid}/delete)                 | ❌ |
| [List time corrections for employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1time-corrections/get)                        | ❌ |
| [Create time correction for employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1time-corrections/post)                      | ❌ |
| [Single time correction from employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1time-corrections~1{correctionUuid}/get)    | ❌ |
| [Update time correction from employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1time-corrections~1{correctionUuid}/patch)  | ❌ |
| [Remove time correction from employee](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1time-corrections~1{correctionUuid}/delete) | ❌ |
| [List of closures](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1closures/get)                                                  | ❌ |
| [Create closure](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1closures/post)                                                   | ❌ |
| [Last closure](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1closures~1last-closure-date/get)                                   | ❌ |
| [Remove closure](https://abaninja.ch/apidocs/#tag/EmployeeTimeSettings/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1closures~1{closureUuid}/delete)                                  | ❌ |

| [EmployeeStatistics](https://abaninja.ch/apidocs/#tag/EmployeeStatistics)                                                                                                                  | ❌ |
|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [Employee holiday](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1holidays/get)                                 | ❌ |
| [Employee flex time](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1flex-time/get)                              | ❌ |
| [Employee target time](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1target-time/get)                          | ❌ |
| [Employee calendar](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1calendar/get)                                | ❌ |
| [Employee daily](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1daily~1{date}/get)                              | ❌ |
| [List not closed In&Out entries](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1daily~1{date}~1open-in-out/get) | ❌ |
| [Daily Closed](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1daily~1{date}~1closed/get)                        | ❌ |
| [Employee Daily totals](https://abaninja.ch/apidocs/#tag/EmployeeStatistics/paths/~1accounts~1{accountUuid}~1time~1v2~1employees~1{employeeUuid}~1daily~1{date}~1totals/get)               | ❌ |

---

### Holidays

| [SettingsTime](https://abaninja.ch/apidocs/#tag/SettingsTime)                                                                                                        | ❌ |
|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|---|
| [List holiday for state](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1holidays/get)                                  | ✅ |
| [Create holiday entry](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1holidays/post)                                   | ❌ |
| [Single holiday](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1holidays~1{holidayUuid}/get)                           | ✅ |
| [Update holiday](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1holidays~1{holidayUuid}/patch)                         | ❌ |
| [Remove holiday](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1holidays~1{holidayUuid}/delete)                        | ❌ |
| [List of activity types](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1activity-types/get)                      | ❌ |
| [Create activity type](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1activity-types/post)                       | ❌ |
| [Single activity type](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1activity-types~1{activityTypeUuid}/get)    | ❌ |
| [Update activity type](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1activity-types~1{activityTypeUuid}/patch)  | ❌ |
| [Remove activity type](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1activity-types~1{activityTypeUuid}/delete) | ❌ |
| [List work models](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1work-models/get)                               | ❌ |
| [Create work model](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1work-models/post)                             | ❌ |
| [Single work model](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1work-models~1{workModelUuid}/get)             | ❌ |
| [Update work model](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1work-models~1{workModelUuid}/patch)           | ❌ |
| [Remove work model](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1work-models~1{workModelUuid}/delete)          | ❌ |
| [Activity settings](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1activity/get)                                 | ❌ |
| [Update activity settings](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1time~1v2~1settings~1activity/patch)                        | ❌ |
| [Holiday settings](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1settings/get)                                        | ❌ |
| [Update holiday settings](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1settings/patch)                               | ❌ |
| [Convert holiday](https://abaninja.ch/apidocs/#tag/SettingsTime/paths/~1accounts~1{accountUuid}~1holidays~1v2~1settings~1convert/post)                               | ❌ |

## Author

PHP-Core [dev@php-core.com](mailto:dev@php-core.com)
