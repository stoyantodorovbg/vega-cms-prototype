import { mount } from '@vue/test-utils'
import DerivedSelectInput from "../../js/components/inputs/DerivedSelectInput";

describe('DerivedSelectInput Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(DerivedSelectInput);

    expect(wrapper).toMatchSnapshot();
  });
});
