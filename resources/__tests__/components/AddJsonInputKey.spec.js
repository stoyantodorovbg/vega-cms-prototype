import { mount } from '@vue/test-utils'
import AddJsonInputKey from "../../js/components/inputs/AddJsonInputKey";

describe('AddJsonInputKey Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(AddJsonInputKey);

    expect(wrapper).toMatchSnapshot();
  });
});
