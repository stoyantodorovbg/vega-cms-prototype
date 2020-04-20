import { mount } from "@vue/test-utils";
import ParentSelectInput from "../../js/components/inputs/ParentSelectInput";

describe('ParentSelectInput Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(ParentSelectInput);

    expect(wrapper).toMatchSnapshot();
  })
});
