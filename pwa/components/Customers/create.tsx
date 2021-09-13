import { Create } from 'react-admin';
import CustomerForm from "components/Customers/CustomerForm"

const ServiceCreate = (props) => (
    <>
    <h1>Create Customer</h1>
    <Create {...props} title="Customer" >
        <CustomerForm />
    </Create>
    </>
)

export default ServiceCreate;
