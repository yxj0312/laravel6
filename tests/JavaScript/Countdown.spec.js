import { mount } from '@vue/test-utils';
import expect from 'expect';
import Countdown from '../../resources/js/components/Countdown.vue';
import moment from 'moment';
import sinon from 'sinon';
import Vue from 'vue'

describe ('Countdown', () => {
    let wrapper;

    beforeEach (()=> {
        wrapper = mount(Countdown);
    });

    it ('renders a countdown timer', () => {
        wrapper.setProps({ until: moment().add(10, 'seconds') })
        //  <countdown until="December 5 2017"

        see('10 secondes');
    });
    // Helper Functions

    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper;

        expect(wrap.html()).toContain(text);
    };

    let type = (text, selector) => {
        let node = wrapper.find(selector);

        node.element.value = text;
        node.trigger('input');
    };

    let click = selector => {
        wrapper.find(selector).trigger('click');
    };
});