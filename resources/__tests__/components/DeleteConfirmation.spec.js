import { mount } from '@vue/test-utils'
import DeleteConfirmation from "../../js/components/modals/DeleteConfirmation";

describe('DeleteConfirmation Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(DeleteConfirmation);

    expect(wrapper).toMatchSnapshot()
  });
});
